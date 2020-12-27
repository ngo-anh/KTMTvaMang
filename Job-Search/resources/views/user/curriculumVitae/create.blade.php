@extends('layouts.main')
@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-center text-primary">Create New Curriculum Vitae</h4>
        </div>
    </div>
    {{-- Start Error Message --}}
    @if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif
    {{-- End Error Message --}}
    <form action="{{route('curriculum-vitae.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="curriculumVitae__name">Title</label>
            <input type="text" class="form-control" id="curriculumVitae__title" name="curriculumVitae__title"
                placeholder="Enter Curriculum Vitae's title: ">
        </div>
        <div class="form-group">
            <label for="curriculumVitae__description">Position</label>
            <input class="form-control" id="curriculumVitae__position" rows="5" name="curriculumVitae__position"
                placeholder="Apply Position: " />
        </div>
        <div class="row">
            <div class="col-sm-12 col-12">
                <button type="submit" class="btn btn-primary" name="create">Create</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
@endsection
