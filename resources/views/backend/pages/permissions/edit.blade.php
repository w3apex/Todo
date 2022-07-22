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
                            <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">All Permissions</a></li>
                            <li class="breadcrumb-item active">Edit Permission</li>
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
                        <form action="{{ route('permissions.update', $permission->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('backend.pages.permissions.partials._form', ['buttonText' => __("Update")])
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
    </div> 
</div>
@endsection
