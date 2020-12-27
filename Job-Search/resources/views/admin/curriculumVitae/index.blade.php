@extends('layouts.main')
@section('content')
{{-- Start Content --}}
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-center text-primary">User's Curriculum Vitaes</h4>
        </div>
    </div>
    {{-- Start Table --}}
    <div class="row mt-4">
        <div class="col-sm-12 col-12" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover table-inverse" id="tableDatacurriculumVitae">
                <thead>
                    <tr id="list-header">
                        <th class="text-center" style="">ID</th>
                        <th class="text-center" id="" style="">ID Curriculum Vitae</th>
                        <th class="text-center" id="" style="">Title</th>
                        <th class="text-center" id="" style="">Apply Position</th>
                        <th class="text-center" id="">Created At</th>
                        <th class="text-center" id="">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1?>
                    @foreach($curriculumVitaes as $curriculumVitae)
                    <tr>
                        <td class="text-center" style="vertical-align: middle;">{{$index++}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$curriculumVitae->id}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$curriculumVitae->title}}</td>
                        <td class="text-center" style="vertical-align: middle;">
                            {{$curriculumVitae->apply_position}}
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($curriculumVitae->created_at)->format('d/m/Y')}}
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($curriculumVitae->updated_at)->format('d/m/Y')}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- End Table --}}
    <div>
        {{$curriculumVitaes->links()}}
    </div>
</div>

{{-- End Content --}}
@endsection

@section('scripts')
@endsection
