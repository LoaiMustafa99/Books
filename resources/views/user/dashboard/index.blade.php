@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection

@section("content")

        <header id="header">
            <div class="inner">

                <!-- Logo -->
                <a href="index.html" class="logo safhat-index">
                    <span class="symbol"></span><span class="title">Safahat</span>
                </a>

            </div>
        </header>
        <!-- Main -->
        <div id="main">
            <div class="inner">

                <!--هون في المربعات الملونة-->
                <section class="tiles">
                    <!--هون اول وحدة و كل وحدة بتبلش من artical-->
                    <!--1-->
                    <article class="style1">
									<span class="image">
										<img src="{{asset("images/p1.jpg")}}" alt="" />
									</span>
                        <a href="{{route("books.index")}}">
                            <h2>Books</h2>
                            <div class="content">
                                <!--<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>-->
                            </div>
                        </a>
                    </article>
                    <!--2-->
                    <article class="style2">
									<span class="image">
										<img src="{{asset("images/p2.jpg")}}" alt="" />
									</span>
                        <a href="{{route("category.index")}}">
                            <h2>Categories</h2>
                            <div class="content">
                                <!--<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>-->
                            </div>
                        </a>
                    </article>
                    <!--3-->
                    <article class="style3">
									<span class="image">
										<img src="{{asset("images/p3.jpg")}}" alt="" />
									</span>
                        <a href="{{route("post.index")}}">
                            <h2>Posts</h2>
                            <div class="content">
                                <!--	<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>-->
                            </div>
                        </a>
                    </article>
                    <!--4-->
                    <article class="style4">
									<span class="image">
										<img src="{{asset("images/p4.jpg")}}" alt="" />
									</span>
                        <a href="generic.ht5ml">
                            <h2>Setting</h2>
                            <div class="content">
                                <!--<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>-->
                            </div>
                        </a>
                    </article>
                    <!--5-->
                    <article class="style5">
									<span class="image">
										<img src="{{asset("images/p5.jpg")}}" alt="" />
									</span>
                        <a href="generic.htm5l">
                            <h2>Rating</h2>
                            <div class="content">
                                <!--<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>-->
                            </div>
                        </a>
                    </article>
                    <!--6-->
                    <article class="style6">
									<span class="image">
										<img src="{{asset("images/p6.jpg")}}" alt="" />
									</span>
                        <a href="generic.htm5l">
                            <h2>List</h2>
                            <div class="content">
                                <!--<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>-->
                            </div>
                        </a>
                    </article>

                </section>
            </div>
        </div>
@endsection
