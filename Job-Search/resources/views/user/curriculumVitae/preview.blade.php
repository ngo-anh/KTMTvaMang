@extends('layouts.main')
@section('content')
{{-- Start Content --}}
<div class="container">
    <div class="row shadow-lg rounded border p-4">
        <div class="col-sm-4 col-12">
            <div class="d-flex justify-content-center">
                @if ($curriculumVitae->user->profile_photo_path != null)
                <img src='{{$curriculumVitae->user->profile_photo_path}}' />
                @else
                <img src='{{$curriculumVitae->user->profile_photo_url}}' />
                @endif
            </div>
            <hr />
            <div class="">
                <h5>Address</h5>
                <h6>{{$curriculumVitae->user->address}}</h6>
            </div>
            <div class="">
                <h5>Email</h5>
                <h6>{{$curriculumVitae->user->email}}</h6>
            </div>
            <div class="">
                <h5>Phone Number</h5>
                <h6>{{$curriculumVitae->user->phone_number}}</h6>
            </div>
            <div class="">
                <h5>Date of Birth</h5>
                <h6>{{ \Carbon\Carbon::parse($curriculumVitae->user->date_of_birth)->format('d/m/Y')}}</h6>
            </div>
        </div>
        <div class="col-sm-6 col-12">
            <div class="p-4">
                <h4 class="text-center text-primary">{{$curriculumVitae->title}}</h4>
            </div>
            <div class="d-flex justify-content-between">
                <h5>Apply Position</h5>
                <h6>{{$curriculumVitae->apply_position}}</h6>
            </div>
        </div>
    </div>
</div>
{{-- End Content --}}
@endsection
