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
                            @if(Auth::user()->can('roles.create'))
                                <li class="breadcrumb-item">
                                    <a href="{{ route('permissions.create')}}">Create Permission</a>
                                </li>
                            @endif
                            <li class="breadcrumb-item active">All Permissions</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Permissions</h4>
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
                                <h4>Add New Permission</h4>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-right">
                                    <a href="{{route('permissions.create')}}" class="btn btn-success width-sm waves-effect"><i class="mdi mdi-plus-circle mr-2"></i> Add Permission</a>
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
                                        <th>Group Name</th>
                                        <th>Guard Name</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($permissions as $key => $permission)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">{{ $key+1 }}</label>
                                                </div>
                                            </td>
                                            <td>{{ $permission->name}}</td>
                                            <td>{{ $permission->group_name}}</td>
                                            <td>{{ $permission->guard_name}}</td>
                                            <td>
                                                <a href="{{ route('permissions.edit', $permission->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="{{ route('permissions.destroy', $permission->id)}}" class="btn btn-danger btn-sm delete-row" data-confirm = "Are you sure to delete this?">Delete</a>
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