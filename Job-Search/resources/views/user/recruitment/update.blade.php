@extends('layouts.main')
@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-center text-primary">Update Recruitment</h4>
        </div>
    </div>
    {{-- Start Error Message --}}
    @if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif
    {{-- End Error Message --}}
    <form action="{{route('recruitment.update', $recruitment->id)}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="recruitment__title">Title</label>
            <input type="text" class="form-control" id="recruitment__title" name="recruitment__title"
                placeholder="Enter Title: " value='{{$recruitment->title}}'>
        </div>
        <div class="form-group">
            <label for="recruitment__apply_for">Apply For</label>
            <input class="form-control" id="recruitment__apply_for" rows="5" name="recruitment__apply_for"
                placeholder="Enter Position: " value='{{$recruitment->apply_for}}' />
        </div>
        <div class="form-group">
            <label for="recruitment__salary">Salary</label>
            <input class="form-control" id="recruitment__salary" rows="5" name="recruitment__salary"
                placeholder="Enter Salary " value='{{$recruitment->salary}}' />
        </div>
        <div class="row">
            <div class="offset-sm-6 col-sm-6 offset-6 col-6">
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
@endsection
