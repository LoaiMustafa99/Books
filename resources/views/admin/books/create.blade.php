@extends("layouts.admin.app")
@section("page-title")
    {{__("Dashboard")}}
@endSection
@section("page-nav-title")
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>{{__("Book")}}</h1>
        </div>

        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">{{__("Dashboard")}}</a></li>
            <li class="breadcrumb-item"><a href="{{route("admin.books.index")}}">{{__("Book")}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{__("Create")}}</a></li>
        </ul>
    </div>
@endsection

@section("content")

    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="tile">
                <h3 class="tile-title">{{__("Create New Book")}}</h3>
                <div class="tile-body">
                    <form method="post" action="{{route("admin.books.store")}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{__("Book Name")}}</label>
                                    <input class="form-control @if($errors->has('name')) is-invalid @endif" type="text" name="name" placeholder="{{__("Enter Book Name")}}">
                                </div>
                                @error("name")
                                <div class="input-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{__("User")}}</label>
                                    <select class="form-control @if($errors->has('user_id')) is-invalid @endif" name="user_id" id="">
                                        <option value="">Select User</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error("user_id")
                                <div class="input-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{__("Age From")}}</label>
                                    <input class="form-control @if($errors->has('age_from')) is-invalid @endif" type="number" name="age_from" placeholder="{{__("Enter Age From")}}">
                                </div>
                                @error("age_from")
                                <div class="input-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{__("Age To")}}</label>
                                    <input class="form-control @if($errors->has('age_to')) is-invalid @endif" type="number" name="age_to" placeholder="{{__("Enter Age To")}}">
                                </div>
                                @error("age_to")
                                <div class="input-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{__("Category")}}</label>
                                    <select class="form-control @if($errors->has('category_id')) is-invalid @endif" name="category_id" id="mainCategory" data-url="{{route("admin.sub_categories.by_main_category")}}">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error("category_id")
                                <div class="input-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6" id="subCategoriesBox" style="@if(!$errors->has('sub_category')) display: none @endif">
                                <div class="form-group">
                                    <label for="exampleSelect1">{{__("Sub Category")}}</label>
                                    <select class="form-control"  id="SubCategories" name="sub_category">
                                    </select>
                                </div>
                                @error("sub_category")
                                <div class="input-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{__("Made Year")}}</label>
                                    <input class="form-control @if($errors->has('made_year')) is-invalid @endif" type="date" name="made_year" placeholder="{{__("Enter Book Made Year")}}">
                                </div>
                                @error("made_year")
                                <div class="input-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{__("Description")}}</label>
                                    <textarea name="description" class="form-control @if($errors->has('description')) is-invalid @endif" placeholder="{{__("Enter Book Description")}}" cols="30" rows="10"></textarea>
                                </div>
                                @error("description")
                                <div class="input-error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        {{--                        <hr>--}}

                        {{--                        <div class="row">--}}
                        {{--                            <div class="col-lg-6">--}}
                        {{--                                <div class="form-group">--}}
                        {{--                                    <label class="control-label">{{__("Main Category Photo")}}</label>--}}
                        {{--                                    <div>--}}
                        {{--                                        <button class="btn btn-primary form-control button-upload-file" >--}}
                        {{--                                            <input class="input-file show-uploaded" data-upload-type="single" data-imgs-container-class="uploaded-images" type="file" name="main_category_photo">--}}
                        {{--                                            <span class="upload-file-content">--}}
                        {{--                                                <i class="fas fa-upload fa-lg upload-file-content-icon left"></i>--}}
                        {{--                                                <span class="upload-file-content-text">{{__("Upload Photo")}}</span>--}}
                        {{--                                            </span>--}}
                        {{--                                        </button>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                @error("main_category_photo")--}}
                        {{--                                <div class="input-error">{{$message}}</div>--}}
                        {{--                                @enderror--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-lg-3 col-md-5 col-sm-6">--}}
                        {{--                                <div class="uploaded-images"></div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> {{__("Create")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("scripts")

    <script src="{{asset("assets/js/pages/service.js")}}"></script>

@endsection
