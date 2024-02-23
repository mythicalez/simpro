<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartlistOut extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['part_master_id', 'qty', 'catatan', 'status']; // sesuaikan dengan kolom yang Anda miliki
    protected $table = 'partlist_out';

    public function part_master()
    {
        return $this->belongsTo(PartMaster::class);
    }
}
