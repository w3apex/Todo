@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('style-top')
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
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
                            <li class="breadcrumb-item"><a href="{{ route('users.create')}}">Create User</a></li>
                            <li class="breadcrumb-item active">All Users</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Admins</h4>
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
                                <h4>Add New Admin</h4>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-right">
                                    <a href="{{route('users.create')}}" class="btn btn-success width-sm waves-effect"><i class="mdi mdi-plus-circle mr-2"></i> Add User</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered table-striped dt-responsive nowrap w-100" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Department</th>
                                        <th style="width: 75px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key => $user)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">{{ $key+1 }}</label>
                                                </div>
                                            </td>
                                            <td>{{ $user->name}}</td>
                                            <td>{{ $user->email}}</td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    <span class="badge badge-info mr-2">
                                                        {{$role->name}}
                                                    </span>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ (!empty($user->department->name)) ? $user->department->name : ''}}
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id)}}" class="action-icon text-success"> 
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>
                                                <a href="{{ route('users.destroy', $user->id)}}" class="action-icon delete-row text-danger" data-confirm = "Are you sure to delete this?"> 
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
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
</div>
@endsection

@section('script-top')
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#basic-datatable").DataTable();
        } );
    </script>
@endsection