@extends('layouts.main')

@section('content')
{{-- Start Content --}}
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-center text-primary">Users Management</h4>
        </div>
    </div>
    {{-- <form method="POST" action="{{route('admin.searchUsersWithEmail')}}">
    @csrf
    <div class="row d-flex align-items-center">
        <div class="col-sm-11 col-11">
            <input type="text" class="form-control" name="keyword" placeholder="What are you looking for?">
        </div>
        <div class="col-sm-1 col-1">
            <button type="submit" class="btn">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
    </form> --}}

    {{-- Start Table --}}
    <div class="row mt-4">
        <div class="col-sm-12 col-12" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover table-inverse" id="tableDataCompany">
                <thead>
                    <tr id="list-header">
                        <th class="text-center" style="">Index</th>
                        <th class="text-center" id="" style="">ID</th>
                        <th class="text-center" id="" style="">Name</th>
                        <th class="text-center" id="" style="">Email</th>
                        <th class="text-center" id="">Address</th>
                        <th class="text-center" id="">Avatar</th>
                        <th class="text-center" id="">Gender</th>
                        <th class="text-center" id="">Role</th>
                        <th class="text-center" id="">Created At</th>
                        <th class="text-center" id="">Updated At</th>

                        <th class="text-center" id="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1?>
                    @foreach($users as $user)
                    <tr>
                        <td class="text-center" style="vertical-align: middle;">{{$index++}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$user->id}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$user->name}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$user->email}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$user->address}}</td>
                        <td class="d-flex justify-content-center" style="vertical-align: middle;">
                            @if (isset($user->profile_photo_path))
                            @if ($user->profile_photo_path != null)
                            <img class="" style="width: 3vw; height: auto; max-height: 15vh; object-fit: cover;"
                                src="{{$user->profile_photo_path}}" alt="image" />
                            @endif
                            @elseif (isset($user->profile_photo_url))
                            <img class="" style="width: 3vw; height: auto; max-height: 15vh; object-fit: cover;"
                                src="{{$user->profile_photo_url}}" alt="image" />
                            @endif
                        </td>
                        <td class="text-center text-capitalize" style="vertical-align: middle;">
                            {{$user->gender->name}}
                        <td class="text-center text-capitalize" style="vertical-align: middle;">
                            {{$user->role->name}}
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y')}}
                        </td>
                        <td class="text-center p-4" style="vertical-align: middle;">
                            <a class="btn btn-primary" href="{{route('admin.statistic', ['id' => $user->id])}}">
                                View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- End Table --}}
    <div>
        {{$users->links()}}
    </div>
</div>

{{-- End Content --}}
@endsection

@section('scripts')

@endsection
