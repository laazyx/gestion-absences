<?php

namespace App\Models;
use App\Models\Groupe;
use App\Models\Etudiant;
use App\Models\Seance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousGroupe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
    ];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'groupe_id');
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class, 'sous_groupe_id');
    }

    public function seances()
    {
        return $this->belongsToMany(Seance::class, 'seance_sous_groupe', 'sous_groupe_id', 'seance_id');
    }
}
