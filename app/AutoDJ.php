<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoDJ extends Model {

    //
    protected $connection = 'RadioBot';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'body',
        'subject',
        'image_url',
        'public',
        'poster_id',

    ];

    protected $table = 'AutoDJ';

    public function GetFileInfo($id)
    {
        $file = AutoDJFileIO($id);
        dd($file);
    }

}

class AutoDJFileIO {

    private $ID;
    private $filename;
    private $path;
    private $database;

    public function __construct( $id )
    {
        $this->ID = $id;
        $this->database = AutoDJ::find($id);
        $this->filename = $this->database->filename;
        $this->path = $this->database->path;

    }
    private function FullPath()
    {
        return $this->path . $this->filename;
    }

    public function delete()
    {
        if (unlink($this->FullPath()))
        {
            return true;
        }
        return false;

    }
}