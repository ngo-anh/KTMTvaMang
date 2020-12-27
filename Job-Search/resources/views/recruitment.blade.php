@extends('layouts.home')
@section('body')
<div class="container">
    <div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="col-sm-12 col-12">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="row d-flex align-items-center">
                            <h5>Tiêu Đề</h5>
                        </div>
                        <div class="row d-flex align-items-center">
                            <h5 class="">Mức Lương</h5>
                        </div>
                    </div>
                </div>
            </li>
            @foreach($recruitments as $recruitment)
            <li class="list-group-item">
                <div class="col-sm-12 col-12">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="row d-flex align-items-center">
                            <a href="{{route('recruitment.show', $recruitment->id)}}">
                                {{$recruitment->title}}
                            </a>
                        </div>
                        <div class="row d-flex align-items-center">
                            <span class="">{{$recruitment->salary}} $</span>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div>
        {{$recruitments->links()}}
    </div>
</div>
@endsection
