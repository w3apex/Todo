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
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
           <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="card-box text-center">
                            <img id="showImage" class="rounded-circle avatar-lg img-thumbnail" src="{{ (!empty($user->image)) ? asset("/storage/".$user->image) : asset('backend/assets/images/users/default.png')}}" alt="profile-image">
                            <h4 class="mb-0">{{$user->full_name}}</h4>
                            {{-- <p class="text-muted">@ {{$user->username}}</p> --}}

                            <div class="text-left mt-3">
                                <h4 class="font-13 text-uppercase">About Me :</h4>
                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">{{$user->full_name}}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">{{$user->phone}}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{$user->email}}</span></p>
                                
                                <p class="text-muted mb-2 font-13"><strong>Date of Birth :</strong> <span class="ml-2 ">{{$user->dob}}</span></p>
                                
                                <p class="text-muted mb-2 font-13"><strong>NID :</strong> <span class="ml-2 ">{{$user->nid}}</span></p>

                                <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">Bangladesh</span></p>
                            </div>
                        </div> <!-- end card-box -->
                    </div> <!-- end col-->

                    <div class="col-lg-8 col-xl-8">
                        <div class="card-box">
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                        Office Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link">
                                        Change Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        Settings
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                
                                <div class="tab-pane active" id="aboutme">
                                    <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>Office</h5>
                                    

                                </div> <!-- end tab-pane -->
                                <!-- end about me section content -->

                                <div class="tab-pane show" id="timeline">
                                    <form action="{{route('profiles.password.update')}}" method="post" id="myForm" role="form" class="parsley-examples">
                                        @csrf
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Change Password</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="current_password">Password<span class="text-danger">*</span></label>
                                                    <input id="current_password" type="password" name="current_password" placeholder="Enter current password" required class="form-control">
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="row">    
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="new_password">Password<span class="text-danger">*</span></label>
                                                    <input id="new_password" type="password" name="new_password" placeholder="Enter new password" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                                    <input data-parsley-equalto="#new_password" type="password" required
                                                           placeholder="Password" class="form-control" name="confirm_password" id="confirm_password">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Password Update</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end timeline content-->

                                <div class="tab-pane" id="settings">
                                    <form action="{{route('profiles.update',$user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{$user->first_name}}" placeholder="Enter first name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user->last_name}}" placeholder="Enter last name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="Enter email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}" placeholder="Enter phone">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="text" class="form-control" name="dob" id="dob" value="{{$user->dob}}" placeholder="Enter YYYY-MM-DD">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nid">NID</label>
                                                    <input type="text" class="form-control" name="nid" id="nid" value="{{$user->nid}}" placeholder="Enter NID">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" id="image" class="form-control-file">
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6">
                                                @isset($user)
                                                    <img id="showImage" src="{{ asset($user->image)}}" width="100"><br><br>
                                                @endisset
                                            </div> --}}
                                        </div>

                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#image").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#showImage").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
{{-- @section('scripts')
    <script type="text/javascript">
      $(document).ready(function () {
        $('#myForm').validate({
          rules: {
            current_password: {
              required: true,
            },
            new_password: {
              required: true,
              minlength: 6
            },
            confirm_password: {
              required: true,
              equalTo:'#new_password'
            }
          },
          messages: {
            current_password: {
              required: "Please provide current password",
            },  
            new_password: {
              required: "Please provide new password",
              minlength: "Your password must be at least 6 characters or numbers"
            },
            confirm_password: {
              required: "Please enter confirm password",
              equalTo: "Confirm password does not match!!"
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
        });
      });
    </script>
@endsection --}}




