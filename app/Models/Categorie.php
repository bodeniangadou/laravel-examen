<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['libelle'];
    public function reportages() { return $this->hasMany(Reportage::class); }
}