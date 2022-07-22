@extends('backend.layouts.master')

@section('title')
{{ $title }}
@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('roles.index')}}">All Roles</a></li>
                            <li class="breadcrumb-item active">Create Role</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Roles</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('roles.update', $role->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="name">Role Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{$role->name}}">
                                        
                                        <p class="text-danger">
                                            {{ $errors->first('name')}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="name">Permissions</label>
            
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1" {{ App\Models\User::roleHasPermissions($role, $all_permissions) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="checkPermissionAll">All</label>
                                        </div>
                                        <hr>
                                        @php $i = 1; @endphp
                                        @foreach ($permission_groups as $group)
                                            <div class="row">
                                                @php
                                                    $permissions = App\Models\User::getPermissionsByGroupName($group->name);
                                                    //$roleHasPermission = App\Models\User::checkroleHasPermission();
                                                    $j = 1;
                                                @endphp
            
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                                    </div>
                                                </div>
            
                                                <div class="col-9 role-{{ $i }}-management-checkbox">
                                                    
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox','{{ $i }}Management',{{count($permissions)}})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                            <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                        </div>
                                                        @php  $j++; @endphp
                                                    @endforeach
                                                    <br>
                                                </div>
            
                                            </div>
                                            @php  $i++; @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i> Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('backend.pages.roles.partials._scripts')
@endsection
