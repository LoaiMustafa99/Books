<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class SubCategory extends Model
{
    protected $table = "sub_categories";

    public function main(){
        return $this->belongsTo(Category::class, "main_id", "id");
    }
    public function parent(){
        return $this->belongsTo(SubCategory::class, "parent_id", "id");
    }
    public function childrens(){
        return $this->hasMany(SubCategory::class, "parent_id", "id");
    }
    public function siblings(){
        $instance = $this->hasMany(SubCategory::class, "parent_id", "parent_id");
        $instance->where([["level", $this->level],["id" , "!=", $this->id]]);
        return $instance;
    }

    // Queries Methods
    public static function getFirstLevel($mainCategoryId){
        return self::where([["main_id", $mainCategoryId],["parent_id" ,null]])->get();
    }

}
