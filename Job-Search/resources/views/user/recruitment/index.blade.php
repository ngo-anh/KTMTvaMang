@extends('layouts.main')
@section('content')
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
            <h4 class="text-center text-primary">Recruitment of <a class="text-info text-decoration-none"
                    href='{{route('company.show', $company->id)}}'>{{$company->name}}</a></h4>
        </div>
    </div>
    <div class="row">
        <div class="offset-sm-11 col-sm-1 offset-8 col-4">
            <a class="btn btn-primary" href="{{ route('recruitment.create')}}">Create</a>
        </div>
    </div>
    {{-- Start Table --}}
    <div class="row mt-4">
        <div class="col-sm-12 col-12" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover table-inverse" id="tableDatarecruitment">
                <thead>
                    <tr id="list-header">
                        <th class="text-center" style="">Index</th>
                        <th class="text-center" id="" style="">ID Recruitment</th>
                        <th class="text-center" id="" style="">Title</th>
                        <th class="text-center" id="" style="">Apply For</th>
                        <th class="text-center" id="" style="">Salary</th>
                        <th class="text-center" id="">Created At</th>
                        <th class="text-center" id="">Updated At</th>

                        <th class="text-center" id="" style="">Action</th>
                        <th class="text-center" id="" style="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1?>
                    @foreach($recruitments as $recruitment)
                    <tr>
                        <td class="text-center" style="vertical-align: middle;">{{$index++}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$recruitment->id}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$recruitment->title}}</td>
                        <td class="text-center" style="vertical-align: middle;">
                            {{$recruitment->apply_for}}
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            {{$recruitment->salary}} $
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($recruitment->created_at)->format('d/m/Y')}}
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($recruitment->updated_at)->format('d/m/Y')}}
                        </td>

                        {{-- Start Action --}}
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="{{route('recruitment.edit', $recruitment->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="#" class="btn btn-danger" id="recruitment__delete__{{$recruitment->id}}">Delete</a>
                        </td>
                        {{-- End Action --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- End Table --}}
</div>
{{-- Start Modal --}}
@foreach($recruitments as $recruitment)
<div class="modal fade" id="modal__delete__{{$recruitment->id}}" tabindex="-1" role="dialog"
    aria-labelledby="modalDelete" aria-hidden="true" style="display:none;">
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
                <a href="#" id="recruitment__delete__sure__{{$recruitment->id}}" class="btn btn-primary">Sure</a>
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- End Modal --}}
@endsection
@section('scripts')
@foreach ($recruitments as $recruitment)
<script defer>
    $('#recruitment__delete__{{$recruitment->id}}').on('click', function (e) {
        e.preventDefault();
        $('#modal__delete__{{$recruitment->id}}').modal('show');
    } );

    $('#recruitment__delete__sure__{{$recruitment->id}}').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{route('recruitment.destroy', $recruitment->id)}}`,
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
            $('#modal__delete__{{$recruitment->id}}').modal('hide');
        })
    })
</script>
@endforeach
@endsection
