<?php
namespace App\Helpers\Media\Src;


use App\Helpers\Media\Models\Media;
use Illuminate\Support\Facades\File;

trait MediaInitialization {


    protected $uploadPath = 'uploads';
    protected $urlPath = null;

    public function __construct()
    {
        $this->uploadPath = trim($this->setMediaSavedPath(), config("global.ds")) . config("global.ds");
        $this->urlPath = str_replace("\\", "/", $this->uploadPath);
    }

    public function upload($file, $directoryPath){
        $imageName = time() . rand(0,100000000000) * 35 . "." . $file->getClientOriginalExtension();
        $file->move($directoryPath, $imageName);
        return $imageName;
    }


    public function files(){
        if($this->setMediaRelationType() == 1)
            return $this->morphOne(Media::class, 'mediaable', 'media_type', 'type_id');
        else
            return $this->morphMany(Media::class, 'mediaable', 'media_type', 'type_id');
    }

    public function getMediaFiles(){
        return $this->files;
    }

    public function getFirstMediaFile(){
        if($this->setMediaRelationType() == 1)
            return $this->files;
        else{
            if($this->files->isNotEmpty())
                return $this->files[0];
            else
                return null;
        }
    }

    /**
     * Store the uploaded file on a filesystem disk.
     *
     * @param  \Illuminate\Http\UploadedFile  $path
     */
    public function initizeMedia($file){
        try {
            $uploadPath = $this->uploadPath . config("global.ds") . $this->id;
            $media = new Media();
            $filename = $this->upload($file, $uploadPath);
            $media->filename = $filename;
            $media->path = $this->urlPath. '/' . $this->id;
            return $media;
        }catch (\Exception $e){
            die($e->getMessage());
        }

    }

    /**
     * Store the uploaded file on a filesystem disk.
     *
     * @param  \Illuminate\Http\UploadedFile  $path
     */
    public function saveMedia(\Illuminate\Http\UploadedFile $file){
        $media = $this->initizeMedia($file);
        return $this->files()->save($media);
    }

    public function removeFiles($files){
        if($files instanceof \Illuminate\Database\Eloquent\Collection){
            foreach ($files as $file){
                File::delete($file->path . config("global.ds") . $file->filename);
                $file->delete();
            }
        }else{
            $file = $files;
            File::delete($file->path . config("global.ds") . $file->filename);
            $file->delete();
        }
    }

    public function removeAllFiles() : bool{
        if($this->files){
            if($this->files instanceof \Illuminate\Database\Eloquent\Collection){
                foreach ($this->files as $file)
                    $file->delete();
            }else
                $this->files->delete();

            return $this->removeDir($this->uploadMainPath . config("global.ds") . $this->id);
        }
        return false;
    }

    public function removeHisDirectory() : bool{
        if($this->files){
            if($this->files instanceof \Illuminate\Database\Eloquent\Collection){
                foreach ($this->files as $file)
                    $file->delete();
            }else
                $this->files->delete();

            return $this->removeDir($this->setMediaSavedPath() . config("global.ds") . $this->id);
        }
        return false;
    }

    protected function removeDir($path){
        if(is_dir($path)){
            $files = glob($path . "*" , GLOB_MARK);
            foreach($files as $file){
                $this->removeDir($file);
            }
            if(is_dir($path))
                rmdir($path);
        }elseif(is_file($path)){
            unlink($path);
        }
        return true;
    }
}
