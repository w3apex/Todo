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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.view')}}">Dashboard</a></li>
                            @if(Auth::user()->can('roles.create'))
                                <li class="breadcrumb-item">
                                    <a href="{{ route('roles.create')}}">Create Role</a>
                                </li>
                            @endif
                            <li class="breadcrumb-item active">All Roles</li>
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
                        @include('backend.layouts.partials._messages')
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <h4>Add New Role</h4>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-right">
                                    <a href="{{route('roles.create')}}" class="btn btn-success width-sm waves-effect"><i class="mdi mdi-plus-circle mr-2"></i> Add Role</a>
                                </div>
                            </div>
                        </div>
                        <table id="basic-datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%">SL.</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $role->name}}</td>
                                        <td>
                                            @foreach($role->permissions as $perm)
                                                <span class="badge badge-info mr-2">
                                                    {{$perm->name}}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{-- @if(Auth::user()->can('roles.edit')) --}}
                                                <a href="{{ route('roles.edit', $role->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            {{-- @endif
                                            @if(Auth::user()->can('roles.delete')) --}}
                                                <a href="{{ route('roles.destroy', $role->id)}}" class="btn btn-danger btn-sm delete-row" data-confirm = "Are you sure to delete this?">Delete</a>
                                            {{-- @endif --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td collspan="3">No data available here..</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection