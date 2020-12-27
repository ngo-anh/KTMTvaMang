@extends('layouts.main')

@section('content')
{{-- Start Content --}}
<div class="container-fluid pt-5">
    {{-- Start Status --}}
    @if (session('status'))
    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="alert alert-primary">
                {{session('status')}}
            </div>
        </div>
    </div>
    @endif
    {{-- End Status --}}

    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-center text-primary">My Companies</h4>
        </div>
    </div>
    <div class="row">
        <div class="offset-sm-11 col-sm-1 offset-8 col-4">
            <a class="btn btn-primary" href="{{ route('company.create')}}">Create</a>
        </div>
    </div>
    {{-- Start Table --}}
    <div class="row mt-4">
        <div class="col-sm-12 col-12" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover table-inverse" id="tableDataCompany">
                <thead>
                    <tr id="list-header">
                        <th class="text-center" style="">ID</th>
                        <th class="text-center" id="" style="">ID Company</th>
                        <th class="text-center" id="" style="">Name</th>
                        <th class="text-center" id="" style="">Description</th>
                        <th class="text-center" id="">Address</th>
                        <th class="text-center" id="">Image</th>
                        <th class="text-center" id="">Created At</th>

                        <th class="text-center" id="">Recruitment</th>

                        <th class="text-center" id="" style="">Action</th>
                        <th class="text-center" id="" style="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1?>
                    @foreach($companies as $company)
                    <tr>
                        <td class="text-center" style="vertical-align: middle;">{{$index++}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$company->id}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$company->name}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$company->description}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$company->address}}</td>
                        <td class="d-flex justify-content-center" style="vertical-align: middle;">
                            <img class="" style="width: 10vw; height: auto; max-height: 15vh; object-fit: cover;"
                                src="{{$company->image_path}}" alt="image" />
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($company->created_at)->format('d/m/Y')}}
                        </td>
                        {{-- Start Recruitment --}}
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="{{route('recruitment.show', $company->id)}}" class="btn btn-info">Recruitment</a>
                        </td>
                        {{-- End Recruitment --}}
                        {{-- Start Action --}}
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="{{route('company.edit', $company->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="#" class="btn btn-danger" id="company__delete__{{$company->id}}">Delete</a>
                        </td>
                        {{-- End Action --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- End Table --}}
    <div>
        {{$companies->links()}}
    </div>
</div>


{{-- Start Modal --}}
@foreach($companies as $company)
<div class="modal fade" id="modal__delete__{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDelete"
    aria-hidden="true" style="display:none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDelete">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{trans('message.delete')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="#" id="company__delete__sure__{{$company->id}}" class="btn btn-primary">Sure</a>
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- End Modal --}}
{{-- End Content --}}
@endsection

@section('scripts')
@foreach ($companies as $company)
<script defer>
    $('#company__delete__{{$company->id}}').on('click', function (e) {
        e.preventDefault();
        $('#modal__delete__{{$company->id}}').modal('show');
    } );

    $('#company__delete__sure__{{$company->id}}').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{route('company.destroy', $company->id)}}`,
            type: 'DELETE',
        })
        .done(function () {
            location.reload();
        })
        .fail(function(err){
            console.error("Error:" + err);
            alert("Error");
        })
        .always(function(){
            $('#modal__delete__{{$company->id}}').modal('hide');
        })
    })
</script>
@endforeach
@endsection
