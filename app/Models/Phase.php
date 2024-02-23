<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phase extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['subproject_id', 'nama_phase', 'prioritas'];

    public function subproject()
    {
        return $this->belongsTo(SubProject::class, 'subproject_id', 'id');
    }
}
