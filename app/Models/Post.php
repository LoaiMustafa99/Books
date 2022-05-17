<?php

namespace App\Models;

use App\Helpers\Media\Src\IMedia;
use App\Helpers\Media\Src\MediaInitialization;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements IMedia
{
    use MediaInitialization;

    public function setMainDirectoryPath(): string
    {
        return "posts";
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function comment(){
        return $this->hasMany(Comment::class, "post_id");
    }
}
