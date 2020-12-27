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
                            <h5 class="">Vị Trí</h5>
                        </div>
                    </div>
                </div>
            </li>
            @foreach($curriculumVitaes as $item)
            <li class="list-group-item">
                <div class="col-sm-12 col-12">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="row d-flex align-items-center">
                            <a href="{{route('curriculum-vitae.show', $item->id)}}">
                                {{$item->title}}
                            </a>
                        </div>
                        <div class="row d-flex align-items-center">
                            <span class="ml-5">{{$item->apply_position}}</span>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div>
        {{$curriculumVitaes->links()}}
    </div>
</div>
@endsection
