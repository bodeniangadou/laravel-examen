<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reportage extends Model
{
    protected $fillable = ['titre', 'description', 'duree_minutes', 'position', 'journaliste_id', 'categorie_id', 'edition_id'];
    public function journaliste() { return $this->belongsTo(Journaliste::class); }
    public function categorie() { return $this->belongsTo(Categorie::class); }
    public function edition() { return $this->belongsTo(Edition::class); }
}
