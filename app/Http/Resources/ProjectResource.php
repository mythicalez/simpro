<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $aktif = $this->active;

        if ($aktif == 1) {
            $aktif = 'Active';
        } else {
            $aktif = 'Non-active';
        }

        return [
            'id' => $this->id,
            'project' => $this->nama_project,
            'tahun' => $this->tahun,
            'aktif' => $aktif,
            'subproject' => $this->subproject
        ];
    }
}
