<?php

namespace App\Models;
use App\Models\Etudiant;
use App\Models\Seance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }

    public function seance()
    {
        return $this->belongsTo(Seance::class, 'seance_id');
    }
}
