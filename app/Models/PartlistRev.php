<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartlistRev extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['partlist_detail_id', 'profile', 'qty', 'length', 'grade', 'area', 'weight', 'status', 'version']; // sesuaikan dengan kolom yang Anda miliki
    protected $table = 'partlist_detail_rev';

    public function partlist_detail()
    {
        return $this->belongsTo(Partlist::class);
    }
}
