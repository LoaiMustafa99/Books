@extends("layout.app")


@section("content")

    <h1>Contact Page</h1>

    <h1>People Cotact</h1>
    <ul>
        @if (!empty($people))
            @foreach ($people as $person)
                <li>{{ $person }}</li>
            @endforeach
        @endif
    </ul>

@stop



@section("footer")

    <script>
        // alert("Hello Word")
    </script>

@stop
