<?php

namespace App\Models;
use App\Models\Groupe;
use App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'description',
    ];

    public function groupes()
    {
        return $this->hasMany(Groupe::class, 'filiere_id');
    }

    public function modules()
    {
        return $this->hasMany(Module::class, 'filiere_id');
    }
}
