@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection

@section("content")

    <h1 style="text-align: center;margin-top: 50px;color: #cc984c;">My books</h1>
    <hr style="width:30%">
    <div class="row" style="margin: 0 auto; width: 80%">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="sampleTable">
                            <thead>
                            <tr>
                                <th>{{__("ID")}}</th>
                                <th>{{__("Name")}}</th>
                                <th>{{__("Image")}}</th>
                                <th>{{__("Description")}}</th>
                                <th>{{__("Age")}}</th>
                                <th>{{__("Publishing Year")}}</th>
                                <th>{{__("Name Category")}}</th>
                                <th>{{__("Created At")}}</th>
                                <th>{{__("Control")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td>{{$book->name}}</td>
                                    <td><img src="{{$book->getFirstMediaFile() ? $book->getFirstMediaFile()->url : Null}}" width="80"></td>
                                    <td>
                                        {{$book->description}}
                                    </td>
                                    <td>{{$book->age_from  . " - " . $book->age_to}}</td>
                                    <td>{{$book->publishing_year}}</td>
                                    <th>{{$book->getFullNameAttribute()}}</th>
                                    <td>{{$book->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route("books.edit", $book->id)}}" class="control-link edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{route("books.destroy", $book->id)}}" method="post">
                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="text-danger"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
