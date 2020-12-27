@extends('layouts.home')
@section('body')
<div class="container py-4">
    <div class="jumbotron">
        <h1 class="display-3">Job Search</h1>
        <p class="lead">Dễ dàng kết nối nhà tuyển dụng với những ứng viên tốt nhất</p>
        <hr class="my-2">
    </div>
    {{-- Start Hot Company --}}
    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-primary">Công Ty Nổi Bật</h4>
        </div>
    </div>
    <div class="row">
        @foreach($featuredCompanies as $company)
        <div class="col-sm-4 col-12">
            <div class="card">
                <a class="" href="{{route('company.show', $company->id)}}">
                    <img class="card-img-top" src='{{$company->image_path}}' alt="Image">
                </a>
                <div class="card-body">
                    <h4 class="card-title">{{$company->name}}</h4>
                    <p class="card-text">
                        {{ \Illuminate\Support\Str::limit($company->description, 100, $end=' ...') }}
                    </p>
                    <hr />
                    <div>
                        <h5 class="text-info">Address</h5>
                        <h6 class="d-flex justify-content-between">
                            <span>{{$company->address}}</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- End Hot Company --}}
    <hr />
    {{-- Start Hot CV --}}
    <div class="row mt-4">
        <div class="col-sm-12 col-12">
            <h4 class="text-primary">Hồ Sơ Nổi Bật</h4>
        </div>
    </div>
    <div class="row">
        @foreach($featuredCVs as $cv)
        <div class="col-sm-4 col-12">
            <div class="card">
                <div class="card-body">
                    <a class="text-decoration-none" href="{{route('curriculum-vitae.show', $cv->id)}}">
                        <h4 class="card-title">{{$cv->title}}</h4>
                    </a>
                    <hr />
                    <div>
                        <h5 class="text-info">Apply Position</h5>
                        <h6 class="d-flex justify-content-between">
                            <span>{{$cv->apply_position}}</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- End Hot CV --}}
    <hr />
    {{-- Start Hot Recruitment --}}
    <div class="row mt-4">
        <div class="col-sm-12 col-12">
            <h4 class="text-primary">Công Việc Nổi Bật</h4>
        </div>
    </div>
    <div class="row">
        @foreach($featuredRecruitment as $recruitment)
        <div class="col-sm-4 col-12">
            <div class="card">
                <div class="card-body">
                    <a class="text-decoration-none" href="{{route('recruitment.display', ['id' => $recruitment->id])}}">
                        <h4 class="card-title">{{$recruitment->title}}</h4>
                    </a>
                    <hr />
                    <div>
                        <h5 class="text-info">Apply For</h5>
                        <h6 class="d-flex justify-content-between">
                            <span>{{$recruitment->apply_for}}</span>
                        </h6>
                    </div>
                    <div>
                        <h5 class="text-info">Salary</h5>
                        <h6 class="d-flex justify-content-between">
                            <span>{{$recruitment->salary}}</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- End Hot Recruitment --}}
</div>
@endsection
