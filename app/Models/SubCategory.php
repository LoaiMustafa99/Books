<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = "sub_categories";

    public function main(){
        return $this->belongsTo(Category::class, "main_id", "id");
    }
    public function parent(){
        return $this->belongsTo(SubCategory::class, "parent_id", "id");
    }
}
