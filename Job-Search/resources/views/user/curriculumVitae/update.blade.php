@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-center text-primary">Update Curriculum Vitae</h4>
        </div>
    </div>
    {{-- Start Error Message --}}
    @if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif
    {{-- End Error Message --}}

    <form action="{{route('curriculum-vitae.update', $curriculumVitae->id)}}" method="POST"
        enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="curriculumVitae__title">Title</label>
            <input type="text" class="form-control" id="curriculumVitae__title" name="curriculumVitae__title"
                placeholder="Enter curriculumVitae's name: " value='{{$curriculumVitae->title}}' />
        </div>
        <div class="form-group">
            <label for="curriculumVitae__position">Position</label>
            <input class="form-control" id="curriculumVitae__position" rows="5" name="curriculumVitae__position"
                value='{{$curriculumVitae->apply_position}}' />
        </div>
        <div class="row">
            <div class="col-sm-12 col-12">
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </div>
        </div>
    </form>

</div>
@endsection
