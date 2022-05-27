@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection

@section("content")
<div class="pt-5">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-12">
            <div class="t-item">
                <div class="body">
                    <div class="navbar">
                        <div class="left">
                            <div class="profile-pic">
                                <div class="border"></div>
                                <img src="{{$post->user->getFirstMediaFile("profile_photo") ? $post->user->getFirstMediaFile("profile_photo")->url : $post->user->defaultUserPhoto()}}" alt="profile pic">
                            </div>
                            <div class="user-name">
                                <div class="name">{{$post->user->full_name}}</div>
                                <div class="since">{{$post->created_at->diffForHumans()}}</div>
                            </div>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::guard("reader")->check() && \Illuminate\Support\Facades\Auth::guard("reader")->user()->id == $post->user_id)
                        <div class="right row justify-content-around" style="width: 10%">
                            <form action="{{route("post.destroy", $post->id)}}" method="POST">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger btn-sm" type="submit">{{__("Delete")}}</button>
                            </form>
                            <a href="{{route("post.edit", $post->id)}}" class="btn btn-success btn-sm">{{__("Edit")}}</a>
                        </div>
                        @endif
                    </div>
                    <div class="content">
                        <p class="post-text">
                            {{$post->description}}
                        </p>
                        <div style="width: 100%;height: 484px;">
                            <img class="post-img" style="max-width: 100%;max-height: 100%;object-fit: cover;" src="{{$post->getFirstMediaFile() ? $post->getFirstMediaFile()->url : Null}}">
                        </div>
                    </div>
                </div>
                <div class="comments">
                    <div class="row-b">
                        <div class="comment icon-div">
                            <button class="icon-text comment-des">Comment</button>
                        </div>
                    </div>
                    <div class="container bootdey com-app displaycom">
                        <div class="col-md-12 bootstrap snippets">
                            <div class="panel">
                                <div class="panel-body">
                                    <textarea class="form-control" id="commentTitle{{$post->id}}" rows="2" placeholder="What are you thinking ?"></textarea>
                                    <div class="mar-top clearfix">
                                        <button class="btn btn-sm btn-primary addComment" data-url="{{route("post.comment.store")}}" data-id="{{$post->id}}" type="submit">Comment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-body" id="comment{{$post->id}}">
                                    @if($post->comment->isNotEmpty())
                                        @foreach($post->comment as $comment)
                                            <div class="media-block">
                                                <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="{{$comment->user->getFirstMediaFile("profile_photo") ? $comment->user->getFirstMediaFile("profile_photo")->url : $comment->user->defaultUserPhoto()}}"></a>
                                                <div class="media-body">
                                                    <div class="mar-btm">
                                                        <a href="#" class="btn-link text-semibold media-heading box-inline">{{$comment->user->full_name}}</a>
                                                        <p class="text-muted text-sm">{{$comment->created_at->diffForHumans()}}</p>
                                                    </div>
                                                    <p>
                                                        {{$comment->text}}
                                                    </p>
                                                    <hr>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section("scripts")
    <script>
        $('.comment-des').click(function(){
            console.log(this.target);
            $(this).parents().siblings(".com-app").toggle('displaycom');
        });
        $(".addComment").click(function () {
            var postId = $(this).data("id"),
                title = $("#commentTitle" + postId).val(),
                url = $(this).data("url");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: url,
                data: {post_id:postId, text: title},
                success: function( response ) {
                    if(response.status_number === 'S200'){
                        console.log(response.data);
                        let html = `
                                    <div class="media-block">
                                        <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="${response.data.image}"></a>
                                        <div class="media-body">
                                            <div class="mar-btm">
                                                <a href="#" class="btn-link text-semibold media-heading box-inline">${response.data.name}</a>
                                                <p class="text-muted text-sm">1 second ago</p>
                                            </div>
                                            <p>${title}</p>
                                            <hr>
                                        </div>
                                    </div>
                                `;
                        $("#comment" + postId).append(html);
                    }
                }
            });
        })
    </script>
@endsection
