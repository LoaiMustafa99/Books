@extends("layouts.user.app")
@section("page-title")
    {{__("Books")}}
@endSection

@section("content")

    <h1 style="text-align: center;margin-top: 50px;color: #cc984c;">books</h1>
    <hr style="width:30%">
    <div class="container">
        <div class="row m-auto">
            <div class="col-6" data-url="{{route("ajax.search")}}">
                <input style="margin-left: 260px" type="text" placeholder="Search...." id="search" class="form-control">
            </div>
        </div>
        <div class="row text-left">
            <div class="col-6">
                <label for="">Main Category</label>
                <select class="form-control" name="" data-url="{{route("ajax.get_main_category")}}" id="mainCategory">
                    <option value="">Select Category</option>
                    @if($categories)
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-6 BoxSubCategory" style="display: none">
                <label for="">Sub Category</label>
                <select class="form-control" data-url="{{route("ajax.get_sub_category")}}" id="subCategory">

                </select>
            </div>
        </div>
    </div>
    <ul class="book-cont" id="BoxBooks">
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
@section("scripts")
    <script>
        $("#mainCategory").on("change", function () {
            $("#subCategory").empty();
            $(".BoxSubCategory").fadeOut();
            $("#BoxBooks").empty().fadeOut();
            var id = $(this).val(),
            url = $(this).data("url");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: url,
                data: {"id": id},
                success: function( response ) {
                    const data = response.data;
                    var option = "<option>Select Category</option>",
                        card = "";
                    console.log(data);
                    data.categories.forEach((category) =>{
                        option += "<option value='" + category.id + "'>" + category.name + "</option>"
                    });
                    console.log(option);
                    $("#subCategory").append(option);
                    $(".BoxSubCategory").fadeIn();
                    data.books.forEach((book) => {
                        let url = "{{ route('category.show', ':id') }}";
                        url = url.replace(':id', book.id);
                        card += `<li class="booking-card" style="background-image: url(${book.image})">
                                    <div class="book-container"></div>
                                    <div class="informations-container">
                                        <h2 class="title"><a href="${url}">${book.name}</a></h2>
                                        <div class="more-information">
                                            <p class="disclaimer">${book.description}</p>
                                        </div>
                                    </div>
                                </li>`;
                    })
                    $("#BoxBooks").append(card).fadeIn();
                },
                error : function (response) {
                    resolve(response);
                }
            });
        });


        $(document).on("change", "#subCategory", function () {
            var id = $(this).val(),
                url = $(this).data("url");
            $("#subCategory").empty();
            $(".BoxSubCategory").fadeOut();
            $("#BoxBooks").empty().fadeOut();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: url,
                data: {"id": id},
                success: function( response ) {
                    const data = response.data;
                    var option = "<option>Select Category</option>",
                        card = "";
                    console.log(data);
                    data.categories.forEach((category) =>{
                        option += "<option value='" + category.id + "'>" + category.name + "</option>"
                    });
                    console.log(option);
                    $("#subCategory").append(option);
                    $(".BoxSubCategory").fadeIn();
                    data.books.forEach((book) => {
                        let url = "{{ route('category.show', ':id') }}";
                        url = url.replace(':id', book.id);
                        card += `<li class="booking-card" style="background-image: url(${book.image})">
                                    <div class="book-container"></div>
                                    <div class="informations-container">
                                        <h2 class="title"><a href="${url}">${book.name}</a></h2>
                                        <div class="more-information">
                                            <p class="disclaimer">${book.description}</p>
                                        </div>
                                    </div>
                                </li>`;
                    })
                    $("#BoxBooks").append(card).fadeIn();
                },
                error : function (response) {
                    resolve(response);
                }
            });
        });

        $("#search").on("keyup", function () {
            $("#BoxBooks").fadeOut();
            var text = $(this).val(),
            url = $(this).parent("div").data("url");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: url,
                data: {"text": text},
                success: function( response ) {
                    const data = response.data;
                    var card = "";
                    data.books.forEach((book) => {
                    let url = "{{ route('category.show', ':id') }}";
                    url = url.replace(':id', book.id);
                    card += `<li class="booking-card" style="background-image: url(${book.image})">
                                <div class="book-container"></div>
                                <div class="informations-container">
                                    <h2 class="title"><a href="${url}">${book.name}</a></h2>
                                    <div class="more-information">
                                        <p class="disclaimer">${book.description}</p>
                                    </div>
                                </div>
                            </li>`;
                    });
                    $("#BoxBooks").empty().append(card).fadeIn();
                },
                error : function (response) {
                    resolve(response);
                }
            });
        })
    </script>
@endsection
