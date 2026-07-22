<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $fillable = ['date_diffusion', 'heure_diffusion', 'type_edition', 'duree_max_minutes', 'statut'];
    public function reportages() { return $this->hasMany(Reportage::class); }
}
