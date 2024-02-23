<?php

namespace App\Models;

use App\Models\PartlistRev;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartlistDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['kd_mark', 'partlist_id', 'part_master_id', 'profile', 'qty', 'length', 'grade', 'area', 'weight', 'status']; // sesuaikan dengan kolom yang Anda miliki
    protected $table = 'partlist_detail';

    public function partlist()
    {
        return $this->belongsTo(Partlist::class);
    }

    public function part_master()
    {
        return $this->belongsTo(PartMaster::class);
    }

    public function partlist_detail_rev()
    {
        return $this->hasMany(PartlistRev::class);
    }
}
