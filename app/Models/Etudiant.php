<?php

namespace App\Models;
use App\Models\SousGroupe;
use App\Models\User;
use App\Models\Absence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'matricule',
        'email',
        'phone',
    ];

    public function sous_groupe()
    {
        return $this->belongsTo(SousGroupe::class, 'sous_groupe_id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'etudiant_id');
    }
}
