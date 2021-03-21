<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'numero'            => $this->numero,
            'observaciones'     => $this->body,
            'tipoCierre'           => $this->tipoCierre->tipo_cierre,
            'honorario' => $this->honorario,
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
