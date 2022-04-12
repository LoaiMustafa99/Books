<?php

namespace App\Helpers\Media\Src;

interface IMedia{
    const ONEMEDIA = 1;
    const MANYMEDIA = 2;
    public function setMediaSavedPath() : string;
    public function files();
    public function initizeMedia(\Illuminate\Http\UploadedFile  $file);
    public function saveMedia(\Illuminate\Http\UploadedFile  $file);
    public function getMediaFiles();
    public function setMediaRelationType() : int;
    public function removeFiles($file);
    public function removeAllFiles() : bool;
    public function removeHisDirectory() : bool;
}
