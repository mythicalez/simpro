<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partlist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['subproject_id', 'nama_file', 'catatan', 'user_id', 'tanggal', 'jenis'];
    protected $table = 'partlist';

    public function partlist_detail()
    {
        return $this->hasMany(Partlist::class);
    }

    public function subproject()
    {
        return $this->belongsTo(SubProject::class, 'subproject_id', 'id');
    }
}
