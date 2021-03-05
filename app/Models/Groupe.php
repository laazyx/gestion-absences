<?php

namespace App\Models;
use App\Models\SousGroupe;
use App\Models\Filiere;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
    ];

    public function sous_groupes()
    {
        return $this->hasMany(SousGroupe::class, 'groupe_id');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }
}
