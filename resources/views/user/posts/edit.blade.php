@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection

@section("content")

    <div class="container" style="margin-top:30px;">
        <h1 style="text-align: center;margin-top: 50px;color: blanchedalmond;">Add new post</h1>
        <hr style="width:30%">
        <form action="{{route("post.update", $post->id)}}" method="post"  style="margin-top: 50px;" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
                <div class="col-md-4">
                    <div class="wrapper-upload">
                        <div class="box">
                            <div class="js--image-preview"></div>
                            <div class="upload-options">
                                <label>
                                    <input type="file" name="photo" class="image-upload" accept="image/*" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <textarea class="form-control textaria-post" id="exampleFormControlTextarea1" name="description" placeholder="add the text for post" rows="5" >{{$post->description}}</textarea>
                        <button type="submit" class="btn btn-outline-primary btn-addpost" >Add the post</button>
                    </div>
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
@endsection
