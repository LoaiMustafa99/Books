@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection
<style>
    .input-file {
        padding:30px;
        width: 300px;
        margin: 0 auto;
        background: #ffffff;
        -webkit-box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0.04);
        box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0);
    }
    .upload-img {
        border-radius: 50%;
        display: inline-block;
        width: 200px;
        height: 200px;
        object-fit: cover;
        object-position: 50% 50%;
        margin-right: 15px;
        vertical-align: middle;
    }
    .input-file-upload {
        position: relative;
        display: inline-block;
        vertical-align: middle;
    }
    .input-file-upload input[type="file"] {
        opacity: 0;
        padding: 10px 0;
        height:36px;
        width: 150px;
    }

    .upload-label {
        height: 13%;
        text-align: center;
        display: block;
        position: absolute;
        line-height: normal;
        padding: 10px;
        font-size: 11px;
        top: 65px;
        transition: all 0.3s ease-in-out;
        z-index: 2;
        background: #546a7b !important;
        color: #ffF;
        border: 1px solid #fff;
        border-radius: 50%;
    }
    .input-file-upload:hover .upload-label {
        background: #546a7b !important;
    }
</style>
@section("content")
@include("includes.dialog")
    <section class="ftco-section">
        <div class="container">
            <form method="POST" action="{{route("reader.profile.update", ["id" => $user->id])}}" class="billing-form" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <label class="upload-label add-item" for="image" style="width: 7%;"><i class="fas fa-edit"></i></label>
                                <input type='file' name="image" style="display:none" onchange="readURL(this);" id="image" />
                                <div class="mt-5">
                                    <img id="file_upload" src="{{$user->getFirstMediaFile("profile_photo") ? $user->getFirstMediaFile("profile_photo")->url : $user->defaultUserPhoto()}}" alt="your image" class="upload-img" />
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-8 -->
                    <div class="col-xl-7 ftco-animate text-left mt-3 mb-3">
                        <h3 class="mb-4 billing-heading">Personal Information</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="{{$user->username}}" required>
                                    @error("username")
                                    <div class="input-error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" disabled class="form-control" value="{{$user->email}}" required>
                                    @error("email")
                                    <div class="input-error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Birth Date</label>
                                    <input type="date" name="birth_date" class="form-control" value="{{$user->birth_date}}" required>
                                    @error("birth_date")
                                    <div class="input-error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" class="form-control" value="{{$user->full_name}}" required>
                                    @error("full_name")
                                    <div class="input-error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h3 class="mb-4 billing-heading">Security</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" name="old_password" class="form-control">
                                    @error("old_password")
                                    <div class="input-error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                    @error("password")
                                    <div class="input-error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control">
                                    @error("confirm_password")
                                    <div class="input-error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <input type="submit"  class="btn pl-5 pr-5 pt-2 pb-2" style="background: #546a7b !important; color: white" value="Save">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form><!-- END -->
        </div>
    </section> <!-- .section -->
@endsection
@section("scripts")
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#file_upload')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
