<?php

namespace App\Models;
use App\Models\SousGroupe;
use App\Models\Absence;
use App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'duration',
    ];

    public function sous_groupes()
    {
        return $this->belongsToMany(SousGroupe::class, 'seance_sous_groupe', 'seance_id', 'sous_groupe_id');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'seance_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
