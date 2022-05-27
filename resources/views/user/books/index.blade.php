@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection

@section("content")

    <h1 style="text-align: center;margin-top: 50px;color: #cc984c;">books</h1>
    <hr style="width:30%">
    <a href="{{route("category.index")}}" class="btn book-btn-add my-2 my-sm-0">Add Book</a>
    <ul class="book-cont">
        @foreach($books as $book)
            <li class="booking-card" style="background-image: url({{$book->book->getFirstMediaFile()->url}})">
                <div class="book-container"></div>
                <div class="informations-container">
                    <h2 class="title"><a href="{{route("category.show", ["id" => $book->book->id])}}">{{$book->book->name}}</a></h2>
                    <div class="more-information">
                        <p class="disclaimer">{{$book->book->description}}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
