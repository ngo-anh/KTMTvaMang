@extends('layouts.main')
@section('content')
{{-- Start Content --}}
<div class="container">
    <div class="row shadow-lg rounded border py-2 mt-4">
        <div class="col-sm-3 col-12">
            <img class="" src='{{$company->image_path}}' />
        </div>
        <div class="col-sm-9 col-12">
            <h4 class="text-center text-primary font-weight-bold font-italic">
                {{$company->name}}
            </h4>
            <hr />
            <div>
                <p>
                    {{$company->description}}
                </p>
            </div>
            <hr />
            <div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-info font-weight-bold">
                        Address
                    </h5>
                    <h6 class="font-italic">
                        {{$company->address}}
                    </h6>
                </div>
            </div>
            <div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-info font-weight-bold">
                        Created At
                    </h5>
                    <h6 class="font-italic">
                        {{ \Carbon\Carbon::parse($company->created_at)->format('j F, Y') }}
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Content --}}
@endsection
