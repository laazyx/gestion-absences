<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Absence;

use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('etudiant.index');
    }

    public function non_assisted_hours($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $absences = Absence::where('etudiant_id', $id)->get();
        $nbr_hours = 0;
        foreach ($absences as $absence) {
            $nbr_hours += $absence->seance->duration;
        }
        dd($etudiant);
    /**
     * ana hna
     * prepare query to get sum(nbr_hours) from seances, absences for etudiant
     */
        return $nbr_hours;
    }
}
