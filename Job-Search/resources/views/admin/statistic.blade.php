@extends('layouts.main')

@section('content')
{{-- Start Content --}}
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-center text-primary">User Statistics</h4>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3 col-12">
            @if ($user->profile_photo_path != null)
            <img class="border rounded" src='{{$user->profile_photo_path}}' />
            @else
            <img class="border rounded" src='{{$user->profile_photo_url}}' />
            @endif
        </div>
        <div class="col-sm-9 col-12">
            <h4 class="text-center">{{$user->name}}</h4>
            <hr />
            <div>
                <h6 class="d-flex justify-content-between align-items-center">
                    <span>Date of Birth:</span>
                    <span>{{ \Carbon\Carbon::parse($user->date_of_birth)->format('d/m/Y')}}</span>
                </h6>
                <h6 class="d-flex justify-content-between align-items-center">
                    <span>Gender:</span>
                    <span class="text-capitalize">{{$user->gender->name}}</span>
                </h6>
                <h6 class="d-flex justify-content-between align-items-center">
                    <span>Email:</span>
                    <span>{{$user->email}}</span>
                </h6>
                <h6 class="d-flex justify-content-between align-items-center">
                    <span>Phone Number:</span>
                    <span>{{$user->phone_number}}</span>
                </h6>
                <h6 class="d-flex justify-content-between align-items-center">
                    <span>Address:</span>
                    <span>{{$user->address}}</span>
                </h6>
            </div>
            <hr />
            <div>
                <h6 class="d-flex justify-content-between align-items-center">
                    <span>Created At:</span>
                    <span>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</span>
                </h6>
                <h6 class="d-flex justify-content-between align-items-center">
                    <span>Updated At:</span>
                    <span>{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y')}}</span>
                </h6>
            </div>
            <hr />
            <div>
                <h6 class="d-flex justify-content-between align-items-center">
                    <span>Count CV:</span>
                    <span>{{$curriculumVitaes->count()}}</span>
                </h6>
                <h6 class="d-flex justify-content-between align-items-center">
                    <span>Count Company:</span>
                    <span>{{$companies->count()}}</span>
                </h6>
            </div>
            <hr />
            <div class="row d-flex justify-content-around">
                <div class="">
                    <a class="btn btn-primary" href="{{route('admin.showListCurriculumVitaeUser',['id'=>$user->id])}}">
                        View Curriculum Vitae
                    </a>
                </div>
                <div class="">
                    <a class="btn btn-primary" href="{{route('admin.showListCompanyUser', ['id' => $user->id])}}">
                        View Company
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- End Content --}}
@endsection

@section('scripts')

@endsection
