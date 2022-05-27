@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection

@section("content")

    <h1 style="text-align: center;margin-top: 50px;color: #cc984c;">Ratings</h1>
    <hr style="width:30%">
    <ul class="book-cont">
        @foreach($books as $book)
            <li class="booking-card" style="background-image: url({{$book->getFirstMediaFile()->url}})">
                <div class="book-container"></div>
                <div class="informations-container">
                    <h2 class="title"><a href="{{route("category.show", ["id" => $book->id])}}">{{$book->name}}</a></h2>
                    <div class="more-information">
                        <p class="disclaimer">{{$book->description}}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
