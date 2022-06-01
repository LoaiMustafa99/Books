@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection

@section("content")

    <div class="container" style="margin-top:30px;">
        <h1 style="text-align: center;margin-top: 50px;color: blanchedalmond;">Add new Book</h1>
        <hr style="width:30%">
        <form action="{{route("books.store")}}" method="post"  style="margin-top: 50px;" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="wrapper-upload">
                        <div class="box">
                            <div class="js--image-preview"></div>
                            <div class="upload-options">
                                <label>
                                    <input type="file" name="book_photo" class="image-upload" accept="image/*" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 text-left" >
                    <div class="form-group">
                        <label class="control-label">{{__("Book Name")}}</label>
                        <input class="form-control @if($errors->has('name')) is-invalid @endif" type="text" name="name" placeholder="{{__("Enter Book Name")}}">
                    </div>
                    @error("name")
                    <div class="input-error">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label class="control-label">{{__("Publishing year")}}</label>
                        <input class="form-control @if($errors->has('publishing_year')) is-invalid @endif" type="date" name="publishing_year" placeholder="{{__("Enter Book Publishing Year")}}">
                    </div>
                    @error("publishing_year")
                    <div class="input-error">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label class="control-label">{{__("Age From")}}</label>
                        <input class="form-control @if($errors->has('age_from')) is-invalid @endif" type="number" name="age_from" placeholder="{{__("Enter Age From")}}">
                    </div>
                    @error("age_from")
                    <div class="input-error">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label class="control-label">{{__("Age To")}}</label>
                        <input class="form-control @if($errors->has('age_to')) is-invalid @endif" type="number" name="age_to" placeholder="{{__("Enter Age To")}}">
                    </div>
                    @error("age_to")
                    <div class="input-error">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleSelect1">{{__("Main Category")}}</label>
                        <select class="form-control" id="mainCategory" name="main_category" data-url="{{route("sub_categories.by_main_category")}}">
                            <option value="">{{__("none")}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error("main_category")
                    <div class="input-error">{{$message}}</div>
                    @enderror
                    <div id="subCategoriesBox" style="@if(!$errors->has('sub_category')) display: none @endif">
                        <div class="form-group">
                            <label for="exampleSelect1">{{__("Sub Category")}}</label>
                            <select class="form-control"  data-url="{{route("sub_categories.by_sub_category")}}" id="SubCategories" name="category_id" >
                            </select>
                        </div>
                        @error("category_id")
                        <div class="input-error">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control textaria-post @if($errors->has('description')) is-invalid @endif" id="exampleFormControlTextarea1" name="description" placeholder="{{__("Enter Book Description")}}" rows="5" ></textarea>
                        <button type="submit" class="btn btn-outline-primary btn-addpost" >Add the Book</button>
                    </div>
                    @error("description")
                    <div class="input-error">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </form>
    </div>
    <!--upload img-->

@endsection

@section("scripts")



    <script>
        function initImageUpload(box) {
            let uploadField = box.querySelector('.image-upload');

            uploadField.addEventListener('change', getFile);

            function getFile(e){
                let file = e.currentTarget.files[0];
                checkType(file);
            }

            function previewImage(file){
                let thumb = box.querySelector('.js--image-preview'),
                    reader = new FileReader();

                reader.onload = function() {
                    thumb.style.backgroundImage = 'url(' + reader.result + ')';
                }
                reader.readAsDataURL(file);
                thumb.className += ' js--no-default';
            }

            function checkType(file){
                let imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    throw 'Datei ist kein Bild';
                } else if (!file){
                    throw 'Kein Bild gewählt';
                } else {
                    previewImage(file);
                }
            }

        }

        // initialize box-scope
        var boxes = document.querySelectorAll('.box');

        for (let i = 0; i < boxes.length; i++) {
            let box = boxes[i];
            initDropEffect(box);
            initImageUpload(box);
        }



        /// drop-effect
        function initDropEffect(box){
            let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

            // get clickable area for drop effect
            area = box.querySelector('.js--image-preview');
            area.addEventListener('click', fireRipple);

            function fireRipple(e){
                area = e.currentTarget
                // create drop
                if(!drop){
                    drop = document.createElement('span');
                    drop.className = 'drop';
                    this.appendChild(drop);
                }
                // reset animate class
                drop.className = 'drop';

                // calculate dimensions of area (longest side)
                areaWidth = getComputedStyle(this, null).getPropertyValue("width");
                areaHeight = getComputedStyle(this, null).getPropertyValue("height");
                maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

                // set drop dimensions to fill area
                drop.style.width = maxDistance + 'px';
                drop.style.height = maxDistance + 'px';

                // calculate dimensions of drop
                dropWidth = getComputedStyle(this, null).getPropertyValue("width");
                dropHeight = getComputedStyle(this, null).getPropertyValue("height");

                // calculate relative coordinates of click
                // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
                x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
                y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;

                // position drop and animate
                drop.style.top = y + 'px';
                drop.style.left = x + 'px';
                drop.className += ' animate';
                e.stopPropagation();

            }
        }

    </script>
    <script src="{{asset("assets/js/pages/service.js")}}"></script>

@endsection
