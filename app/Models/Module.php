<?php

namespace App\Models;
use App\Models\Filiere;
use App\Models\Seance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'description',
        'nbr_hours',
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }

    public function absences()
    {
        return $this->hasMany(Seance::class, 'module_id');
    }
}
