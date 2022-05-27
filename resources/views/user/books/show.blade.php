@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection
<style>

    .main-picture {width: 100%;height: 350px;line-height: 350px;background-color: #f5f5f5;text-align: center;}

    .main-picture img {max-width: 100%;max-height: 100%;object-fit: cover;}

    .box-photo-product {margin:10px auto 0;}

    .box-photo-product .sub-photo{
        width: calc(25% - 7px);
        margin-right: 7px;
        height: 90px;
        background-color: #f5f5f5;
        line-height: 90px;
        text-align: center;
    }

    .box-photo-product .sub-photo:last-of-type {width: 25%;margin-right: 0;}

    .box-photo-product .sub-photo img {max-width: 100%;max-height: 100%;object-fit: cover;}

    @media (max-width:576px) {
        .box-photo-product .sub-photo {margin-left: 20px;width: 20%;margin-right: 0;}
    }

    .information-product {margin-left: 50px;}

    .information-product .product-price {font-weight: bold;color: var(--main--color);font-size: 25px;margin-top: 10px;}

    .information-product .product-description {font-size: 15px;color: #767676;font-style: italic;}

    .information-product .product-name {margin-bottom: 25px;}

    .information-product .product-name h2{font-size: 37px;font-weight: 600;color: #444;}

    .information-product .quantity-product{margin: 10px 0 7px;}

    .information-product .product-date{font-size: 15px;}

    .information-product .product-date span{font-size: 19px;font-weight: 500;}

    .information-product .shop-name h5,
    .information-product .product-status{font-size: 18px;display: inline-block;margin-right: 5px;}

    .information-product .categories-product{margin-bottom: 10px;}

    .information-product .shop-name a{color:var(--main--color);}

    .information-product .shop-name a:hover{font-weight: 500;text-decoration: none;color:var(--dark--orange);}

    .information-product .add-to-cart-btn {
        width: 190px;
        background-color: var(--main--color);
        border-color: var(--main--color);
        color: #fff;
        border-radius: 5px;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }

    .information-product .add-to-cart-btn i {margin-right: 5px;}

    .information-product .add-to-cart-btn:hover {background-color: var(--dark--orange);border-color: var(--dark--orange);color: #fff;}

    .section-comment .title{ margin: 32px 0 50px; color: var(--main--color); font-size: 3rem; }

    .section-comment .comment-product textarea { display: block;margin-bottom: 15px;width: 100%;height: 175px !important;resize: none; outline: none; padding: 10px;}

    .section-comment .comment-product .btn-of-product-comment{
        background-color: var(--main--color);
        border-color: var(--main--color);
        color: #fff;
        margin-bottom: 15px;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }

    .section-comment .comment-product .btn-of-product-comment:hover{background-color: var(--dark--orange);border-color: var(--dark--orange);}

    .section-comment .comment-product .btn-of-product-comment:focus{outline: none;}

    .section-comment .image-comment img{width: 50%;height: 100%;position: relative;top: -24px;left: 30%;}

    .all-comment { margin-bottom: 40px; background-color: #f9f9f9; border-radius: 10px; padding: 20px 33px; }

    .all-comment .comment-options{display: block;margin:5px 0 3px 0;padding: 0 0 15px 5px;}

    .all-comment .comment-options .comment-time{float: right;font-size: 13px;color:#444;}

    .all-comment .comment-options .comment-buttons{float: left;}

    .all-comment .deleteBtn-of-comment-section{
        background: none;
        border: none;
        color: #f00;
        padding: 0;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .all-comment .editBtn-of-comment-section{
        background: none;
        border: none;
        color: #00f;
        padding: 0;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .all-comment .commentBox{margin-top: 10px;}

    .all-comment .user-info-box {width: 100px;}

    .comments { margin-top: 9px;}

    .comments .img-box-comment {display: block; border-radius: 50%; width: 52px; height: 52px; overflow: hidden; margin: auto;}

    .comments .img-box-comment img{ max-width: 100%; height: auto; object-fit: cover;}

    .comments .person-name { font-size: 12px; margin:0;padding: 0; text-align: center; margin-top: 7px;}

    .comments .person-name a{color: var(--main--color); text-decoration: none;}

    .comments .person-type { font-size: 12px;margin:0;padding: 0; text-align: center;line-height: .8;}

    .box2 .box-comment { background-color: #e7e7e7; padding: 12px 14px 4px; margin-top: 20px; border-radius: 9px; width: 45%; position: relative;}

    .box2 .box-comment:after {
        content: "";
        width: 0;
        height: 0;
        border-width: 10px;
        border-style: solid;
        border-color: transparent #e7e7e7 transparent transparent;
        position: absolute;
        left: -18px;
        top: 6px;
    }

    .title-of-edit-comment-box{
        border-bottom: none;
        font-weight: bold;
        width: 100%;
        text-align: center;
    }

    .textarea-of-edit-comment-box{resize: none;}

    .btn-edit-save-of-comment-box{
        margin-right: -4px;
        margin-left: 15px;
        border-radius: 0 5px 5px 0;
        background-color: #61b15a;
        border-color: #61b15a;
        color: #fff;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .btn-edit-save-of-comment-box:hover{background-color: #2bb818;border-color: #2bb818;color: #fff;}

    .btn-edit-of-cancel-comment-box{
        margin-right: -15px;
        margin-left: 15px;
        border-radius: 5px 0 0 5px;
        background-color: #b70909;
        border-color: #b70909;
        color: #fff;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }
    .checked {
        color: orange;
    }
    .btn-edit-of-cancel-comment-box:hover{background-color: #d41313;border-color: #d41313;color: #fff;}
</style>
@section("content")
    <div class="wrapper">
        <div class="container page-distance text-left pt-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 main-photo">
                            <div class="main-picture">
                                <img id="mainimg" src="{{$book->getFirstMediaFile()->url}}" alt="">
                            </div>
                        </div>
                    </div><!--for sub row-->
                </div> <!--for col-lg-6-->

                <div class="col-lg-6">
                    <ul class="list-unstyled information-product">
                        <li class="product-name"><h2 class="text-center">{{$book->name}}</h2></li>
                        <li class="product-date">Created At : <span>{{$book->created_at->diffForHumans()}}</span></li>
                        <li class="categories-product"><span>{{$book->getFullNameAttribute()}}</span></li>
                        <li>Age :<span>{{$book->age_from}} - {{$book->age_to}}</span></li>
                        <br>
                        <li id="productPrice"><h6 class="product-price"><span class="price">Publishing Year: {{$book->publishing_year}}</span> </h6></li>
                        @if(\Illuminate\Support\Facades\Auth::guard("reader")->check())
                            <li>
                                <div class="w-100 justify-content-between" data-url="{{route("category.rating.store", $book->id)}}">
                                    <span id="1" class="fa fa-star @if(isset($rating) && in_array($rating->number_rating, [5,4,3,2,1])) checked @endif rating starsize"></span>
                                    <span id="2" class="fa fa-star @if(isset($rating) && in_array($rating->number_rating, [5,4,3,2])) checked @endif rating starsize"></span>
                                    <span id="3" class="fa fa-star @if(isset($rating) && in_array($rating->number_rating, [5,4,3])) checked @endif rating starsize"></span>
                                    <span id="4" class="fa fa-star @if(isset($rating) && in_array($rating->number_rating, [5,4])) checked @endif rating starsize"></span>
                                    <span id="5" class="fa fa-star @if(isset($rating) && in_array($rating->number_rating, [5])) checked @endif rating starsize"></span>
                                </div>
                            </li>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::guard("reader")->check() && !isset($favorite))
                        <hr>
                        <li><button data-url="{{route("category.favorite.store", $book->id)}}" style="background: #546A7B;color: #fff" class="btn btn-of-product-comment add-favorite">Add To Favorite</button></li>
                        @endif
                    </ul>
                </div><!--for col-lg-6-->
            </div> <!--for  main row-->
            <div class="row mt-5">
                <div class="col-12">
                    <p class="product-description"> {{$book->description}}</p>
                </div>
            </div>
            <hr>
            <div class="section-comment">
                <h2 class="text-center title">{{__("Comment")}}</h2>
                <div class="row">
                    @if(\Illuminate\Support\Facades\Auth::guard("reader")->check())
                        <div class="col-lg-6">
                            <form class="comment-product" action="{{route("category.comment.store", ["book_id" => $book->id])}}" method="post">
                                @csrf
                                <textarea placeholder="write your comment here" name="comment_body"></textarea>
                                <input type="submit" value="Add Comment" style="background: #546A7B;" class="btn btn-of-product-comment">
                            </form>
                        </div>
                    @endif
                    <div class="col-lg-6">
                        <div class="image-comment">
                            <img src="{{asset("assets/comment.png")}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="all-comment">
                @if($book->comment->isNotEmpty())
                    @foreach($book->comment as $comment)
                        <div class="row commentBox" data-id="{{$comment->id}}" id="comment{{$comment->id}}">
                            <div class="user-info-box">
                                <div class="comments">
                                    <div class="img-box-comment">
                                        <img src="{{$comment->user->getFirstMediaFile("profile_photo") ? $comment->user->getFirstMediaFile("profile_photo")->url : $comment->user->defaultUserPhoto()}}">
                                    </div>
                                    <div class="person-name"><a href="#">{{$comment->user->full_name}}</a></div>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-12 box2 commentTextBox">
                                <div class="box-comment ">
                                    <div class="comment-body textComment">
                                        {{$comment->text}}
                                    </div>
                                    <div class="comment-options">
                                        <div class="comment-time">{{$comment->created_at->diffForHumans()}}</div>
                                        @if(\Illuminate\Support\Facades\Auth::guard("reader")->check() && \Illuminate\Support\Facades\Auth::guard("reader")->user()->id == $comment->user_id)
                                        <div class="comment-buttons">
                                            <button class="btn deleteCommentButton deleteBtn-of-comment-section hvr-grow" data-commentid="1"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                        @endif
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    <script>
        $(".commentBox").on("click", function () {
            var id = $(this).data("id");
            let url = "{{ route('category.comment.delete', ["book_id" => $book->id]) }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: url,
                data: {"id": id},
                success: function( response ) {
                    $("#comment" + id).fadeOut();
                },
                error : function (response) {
                    resolve(response);
                }
            });
        });


        $(".add-favorite").on("click", function () {
            var url = $(this).data("url");

            console.log(url);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: url,
                success: function( response ) {
                    $(".add-favorite").fadeOut();
                },
                error : function (response) {
                    resolve(response);
                }
            });
        });

        $(".rating").on("click", function () {
            var numberStar = $(this).attr("id"), i = 1,
            url = $(this).parent("div").data("url");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: url,
                data: {"number_rating": numberStar},
                success: function( response ) {
                    for(i; i <= numberStar; i++){
                        $("#" + i).addClass("checked");
                    }

                    let j = numberStar;

                    for (j++; j <= 5; j++){
                        $("#" + j).removeClass("checked");
                    }                },
                error : function (response) {
                    resolve(response);
                }
            });

        })
    </script>
@endsection
