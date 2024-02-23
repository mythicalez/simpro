<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_project',
        'tahun',
        'active'
    ];

    public function subproject()
    {
        return $this->hasMany(SubProject::class);
    }
}
