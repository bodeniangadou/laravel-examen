<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journaliste extends Model
{
    protected $fillable = ['nom', 'prenom', 'specialite'];
    public function reportages() { return $this->hasMany(Reportage::class); }
public function user()
{
    return $this->hasOne(\App\Models\User::class);
}
}
    