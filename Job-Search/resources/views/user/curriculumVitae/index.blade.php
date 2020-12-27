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
            <h4 class="text-center text-primary">My Curriculum Vitaes</h4>
        </div>
    </div>
    <div class="row">
        <div class="offset-sm-11 col-sm-1 offset-8 col-4">
            <a class="btn btn-primary" href="{{ route('curriculum-vitae.create')}}">Create</a>
        </div>
    </div>
    {{-- Start Table --}}
    <div class="row mt-4">
        <div class="col-sm-12 col-12" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover table-inverse" id="tableDatacurriculumVitae">
                <thead>
                    <tr id="list-header">
                        <th class="text-center" style="">ID</th>
                        <th class="text-center" id="" style="">ID Curriculum Vitae</th>
                        <th class="text-center" id="" style="">Title</th>
                        <th class="text-center" id="" style="">Apply Position</th>
                        <th class="text-center" id="">Created At</th>
                        <th class="text-center" id="">Updated At</th>

                        <th class="text-center" id="">Preview</th>

                        <th class="text-center" id="" style="">Action</th>
                        <th class="text-center" id="" style="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1?>
                    @foreach($curriculumVitaes as $curriculumVitae)
                    <tr>
                        <td class="text-center" style="vertical-align: middle;">{{$index++}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$curriculumVitae->id}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$curriculumVitae->title}}</td>
                        <td class="text-center" style="vertical-align: middle;">
                            {{$curriculumVitae->apply_position}}
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($curriculumVitae->created_at)->format('d/m/Y')}}
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($curriculumVitae->updated_at)->format('d/m/Y')}}
                        </td>
                        {{-- Start Preview --}}
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="{{route('curriculum-vitae.show', $curriculumVitae->id)}}"
                                class="btn btn-info">Preview</a>
                        </td>
                        {{-- End Preview --}}
                        {{-- Start Action --}}
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="{{route('curriculum-vitae.edit', $curriculumVitae->id)}}"
                                class="btn btn-warning">Edit</a>
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="#" class="btn btn-danger"
                                id="curriculumVitae__delete__{{$curriculumVitae->id}}">Delete</a>
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
        {{$curriculumVitaes->links()}}
    </div>
</div>


{{-- Start Modal --}}
@foreach($curriculumVitaes as $curriculumVitae)
<div class="modal fade" id="modal__delete__{{$curriculumVitae->id}}" tabindex="-1" role="dialog"
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
                <a href="#" id="curriculumVitae__delete__sure__{{$curriculumVitae->id}}"
                    class="btn btn-primary">Sure</a>
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- End Modal --}}
{{-- End Content --}}
@endsection

@section('scripts')
@foreach ($curriculumVitaes as $curriculumVitae)
<script defer>
    $('#curriculumVitae__delete__{{$curriculumVitae->id}}').on('click', function (e) {
        e.preventDefault();
        $('#modal__delete__{{$curriculumVitae->id}}').modal('show');
    } );

    $('#curriculumVitae__delete__sure__{{$curriculumVitae->id}}').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{route('curriculum-vitae.destroy', $curriculumVitae->id)}}`,
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
            $('#modal__delete__{{$curriculumVitae->id}}').modal('hide');
        })
    })
</script>
@endforeach
@endsection
