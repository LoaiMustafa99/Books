@extends("layouts.admin.app")
@section("page-title")
    {{__("Books")}}
@endSection
@section("page-nav-title")
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>{{__("Books")}}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">{{__("Dashboard")}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{__("Books")}}</a></li>
        </ul>
    </div>
@endsection

@section("content")
    <div class="row mb-4">
        <div class="col-lg-12">

            <a href="{{route("admin.books.create")}}" class="btn btn-primary">{{__("Create New Book")}}</a>
        </div>
    </div>
    <div class="row">
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#description{{$book->id}}">
                                            {{__("View")}}
                                        </button>
                                        <div class="modal fade" id="description{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Location</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{$book->description}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$book->age_from  . " - " . $book->age_to}}</td>
                                    <td>{{$book->publishing_year}}</td>
                                    <th>{{$book->getFullNameAttribute()}}</th>
                                    <td>{{$book->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route("admin.books.edit", $book->id)}}" class="control-link edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{route("admin.books.destroy", $book->id)}}" method="post" id="delete{{$book->id}}" style="display: none" data-swal-title="{{__("Delete Book")}}" data-swal-text="{{__("Are You Sure To Delete This Book?")}}" data-yes="{{__("Yes")}}" data-no="{{__("No")}}" data-success-msg="{{__("the Book has been deleted Successfully")}}">@csrf @method("delete")</form>
                                        <span href="#" class="control-link remove form-confirm" data-form-id="#delete{{$book->id}}"><i class="far fa-trash-alt"></i></span>
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

@section("scripts")

    <!-- Data table plugin-->
    <script type="text/javascript" src="{{asset("assets/js/plugins/jquery.dataTables.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/dataTables.bootstrap.min.js")}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection
