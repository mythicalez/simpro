<?php

namespace App\Models;

use App\Models\Phase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubProject extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subprojects';
    protected $fillable = ['kode_project', 'project_id', 'nama_subproject', 'kode_angka', 'kode_huruf', 'prioritas'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($subproject) {
            $subproject->splitKodeSubproject();
        });
    }

    protected function splitKodeSubproject()
    {
        preg_match('/^([0-9]+)([a-zA-Z]*)$/', $this->kode_project, $matches);

        if (count($matches) >= 2) {
            $this->kode_angka = $matches[1];
            $this->kode_huruf = isset($matches[2]) ? $matches[2] : null;
        } else {
            // Atur default jika tidak ada angka dan huruf terpisah
            $this->kode_angka = null;
            $this->kode_huruf = null;
        }
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function phase()
    {
        return $this->hasMany(Phase::class, 'subproject_id', 'id');
    }
}
