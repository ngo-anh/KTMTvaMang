@extends('layouts.main')

@section('content')
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-center text-primary">Recruitment of <a class="text-info text-decoration-none"
                    href='{{route('company.show', $company->id)}}'>{{$company->name}}</a></h4>
        </div>
    </div>
    {{-- Start Table --}}
    <div class="row mt-4">
        <div class="col-sm-12 col-12" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover table-inverse" id="tableDatarecruitment">
                <thead>
                    <tr id="list-header">
                        <th class="text-center" style="">Index</th>
                        <th class="text-center" id="" style="">ID Recruitment</th>
                        <th class="text-center" id="" style="">Title</th>
                        <th class="text-center" id="" style="">Apply For</th>
                        <th class="text-center" id="" style="">Salary</th>
                        <th class="text-center" id="">Created At</th>
                        <th class="text-center" id="">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1?>
                    <tr>
                        <td class="text-center" style="vertical-align: middle;">{{$index++}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$recruitment->id}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$recruitment->title}}</td>
                        <td class="text-center" style="vertical-align: middle;">
                            {{$recruitment->apply_for}}
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            {{$recruitment->salary}} $
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($recruitment->created_at)->format('d/m/Y')}}
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($recruitment->updated_at)->format('d/m/Y')}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{-- End Table --}}
</div>
@endsection
