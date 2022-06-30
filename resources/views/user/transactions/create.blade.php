@extends("layouts.user.app")
@section("page-title")
    {{__("Users")}}
@endSection
@section("page-nav-title")
    <div class="header-page">
        <div>
            User / Transaction Wallets / Create
        </div>
    </div>
@endsection

@section("content")

    <div class="wrapper">
        <div class="page-contant">
            <div class="form-contant">
                <div class="row" style="width:100%">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <form action="{{route("reader.wallet.store")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group input-inline">
                                <div class="form-label">
                                    <label>Amount <span>*</span></label>
                                </div>
                                <div class="form-input">
                                    <input type="text" name="amount" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group input-inline">
                                <div class="form-label">
                                    <label>Transaction Type <span>*</span></label>
                                </div>
                                <div class="form-input">
                                    <select name="in_out" id="type" class="form-control">
                                        <option value="">Select type</option>
                                        <option value="1">Income</option>
                                        <option value="-1">Expenses</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group input-inline">
                                <div class="form-label">
                                    <label>Category <span>*</span></label>
                                </div>
                                <div class="form-input">
                                    <select name="status" id="category" class="form-control">
                                        <option value="">Select type</option>
                                        <option value="1">New</option>
                                        <option value="2">Pre Defined</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group input-inline" id="pre-defined" style="display: none">
                                <div class="form-label">
                                    <label>Pre Defined Category <span>*</span></label>
                                </div>
                                <div class="form-input">
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group input-inline" id="name" style="display: none">
                                <div class="form-label">
                                    <label>Name Category <span>*</span></label>
                                </div>
                                <div class="form-input">
                                    <input type="text" name="category" class="form-control">
                                </div>
                            </div>
                            <div class="form-group input-inline">
                                <div class="form-label">
                                    <label>note </label>
                                </div>
                                <div class="form-input">
                                    <textarea name="note" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group input-inline">
                                <div class="form-label"></div>
                                <div class="form-input">
                                    <input type="submit" name="send" value="Save" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $("#category").on("change", function () {
            var value = $(this).val();
            if(value == 1){
                $("#name").fadeIn();
                $("#pre-defined").fadeOut();
            }else if(value == 2){
                $("#name").fadeOut();
                $("#pre-defined").fadeIn();
            }else{
                $("#name").fadeOut();
                $("#pre-defined").fadeOut();
            }
        })
    </script>
@endsection
