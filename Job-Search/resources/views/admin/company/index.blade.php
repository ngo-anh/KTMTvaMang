@extends('layouts.main')

@section('content')
{{-- Start Content --}}
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-center text-primary">User's Companies</h4>
        </div>
    </div>
    {{-- Start Table --}}
    <div class="row mt-4">
        <div class="col-sm-12 col-12" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover table-inverse" id="tableDataCompany">
                <thead>
                    <tr id="list-header">
                        <th class="text-center" style="">ID</th>
                        <th class="text-center" id="" style="">ID Company</th>
                        <th class="text-center" id="" style="">Name</th>
                        <th class="text-center" id="" style="">Description</th>
                        <th class="text-center" id="">Address</th>
                        <th class="text-center" id="">Image</th>
                        <th class="text-center" id="">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1?>
                    @foreach($companies as $company)
                    <tr>
                        <td class="text-center" style="vertical-align: middle;">{{$index++}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$company->id}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$company->name}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$company->description}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$company->address}}</td>
                        <td class="d-flex justify-content-center" style="vertical-align: middle;">
                            <img class="" style="width: 10vw; height: auto; max-height: 15vh; object-fit: cover;"
                                src="{{$company->image_path}}" alt="image" />
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($company->created_at)->format('d/m/Y')}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- End Table --}}
    <div>
        {{$companies->links()}}
    </div>
</div>
{{-- End Content --}}
@endsection

@section('scripts')
@endsection
