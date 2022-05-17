@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection

@section("content")

    <h1 style="text-align: center;margin-top: 50px;color: blanchedalmond;">books</h1>
    <hr style="width:30%">
    <a class="btn book-btn-add my-2 my-sm-0">Add Book</a>
    <ul class="book-cont">
        @foreach($books as $book)
            <li class="booking-card" style="background-image: url(./images/p1.jpg)">
                <div class="book-container"></div>
                <div class="informations-container">
                    <h2 class="title">{{$book->name}}</h2>
                    <div class="more-information">
                        <p class="disclaimer">{{$book->description}}</p>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>
@endsection
