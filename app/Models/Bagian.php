<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;

    protected $table = 'bagian';

    protected $fillable = ['nama'];

    // Definisikan relasi ke model User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
