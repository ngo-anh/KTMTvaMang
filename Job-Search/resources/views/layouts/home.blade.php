@extends('layouts.main')
@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Danh Sách
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('company')}}">Danh Sách Công Ty</a>
                        <a class="dropdown-item" href="{{route('recruitment')}}">Danh Sách Công Việc</a>
                        <a class="dropdown-item" href="{{route('curriculum-vitae')}}">Danh Sách CV</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
@yield('body')
@endsection
