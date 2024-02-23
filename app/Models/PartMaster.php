<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartMaster extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'part_master';
    protected $fillable = ['subproject_id', 'mark', 'kd_mark', 'profile', 'grade', 'length', 'area', 'weight', 'status'];

    public function subproject()
    {
        return $this->belongsTo(SubProject::class, 'subproject_id', 'id');
    }

    public function partlist_detail()
    {
        return $this->hasMany(Partlist::class);
    }

    public function partlist_out()
    {
        return $this->hasMany(PartlistOut::class);
    }
}
