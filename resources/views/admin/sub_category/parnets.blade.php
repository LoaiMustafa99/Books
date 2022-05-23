@if($sub->parent)
    @include("admin.sub_category.parnets", ["sub" => $sub->parent]) @endif
/ <a href="{{route("admin.sub_category.index",["main_id" => $sub->main->id, "parent_id" => $sub->id])}}">{{$sub->name}}</a>
