@extends('layouts.home')
@section('body')
<div class="container">
    <div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="col-sm-12 col-12">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="row d-flex align-items-center">
                            <h5>Tên</h5>
                        </div>
                        <div class="row d-flex align-items-center">
                            <h5 class="">Địa Chỉ</h5>
                        </div>
                    </div>
                </div>
            </li>
            @foreach($companies as $company)
            <li class="list-group-item">
                <div class="col-sm-12 col-12">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="row d-flex align-items-center">
                            <span>
                                <img class="mr-3" src="{{$company->image_path}}"
                                    style="height: 5vh; width: auto; object-fit: cover;" />
                            </span>
                            <a href="{{route('company.show', $company->id)}}">
                                {{$company->name}}
                            </a>
                        </div>
                        <div class="row d-flex align-items-center">
                            <span class="">{{$company->address}}</span>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div>
        {{$companies->links()}}
    </div>
</div>
@endsection
