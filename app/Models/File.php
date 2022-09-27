<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable=['url', 'thumbnail', 'real_name', 'extension', 'archive_id', 'type'];
    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }
    public function copy_to()
    {
        return $this->belongsTo(CopyTo::class,'archive_id');
    }
}
