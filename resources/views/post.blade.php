@extends("layout.app")


@section("content")

<h1>Post Page</h1>
    <ul>
        @foreach($books as $book)
            <li>{{$book->name}}</li>
        @endforeach
    </ul>
    {{-- <a href="{{ route("welcom") }}">Post</a> --}}
@stop
