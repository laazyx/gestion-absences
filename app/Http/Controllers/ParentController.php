<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\Etudiant;
use App\Models\Module;

class ParentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $parent_id = Auth::id();
        $etudiants = Etudiant::where('parent_id', $parent_id)->get();

        return view('parent.index', [
            'etudiants' => $etudiants
        ]);
    }

    public function show_absence($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $absences = Absence::where('etudiant_id', $id);
        $modules = $etudiant->sous_groupe->groupe->filiere->modules;
        // dd($this->module_non_justified_hours($id, 1));

        return view('parent.absence', [
            'etudiant' => $etudiant,
            'modules' => $modules,
            'absences' => $absences
        ]);
    }

    public static function non_assisted_hours($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $absences = $etudiant->absences;
        $nbr_hours = 0;
        foreach ($absences as $absence)
            $nbr_hours += $absence->seance->duration;
        
        return $nbr_hours;
    }

    public static function justified_hours($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $absences = $etudiant->absences;
        $nbr_hours = 0;
        foreach ($absences as $absence)
            if ($absence->is_justified)
                $nbr_hours += $absence->seance->duration;
        
        return $nbr_hours;
    }

    public static function non_justified_hours($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $absences = $etudiant->absences;
        $nbr_hours = 0;
        foreach ($absences as $absence)
            if (!$absence->is_justified)
                $nbr_hours += $absence->seance->duration;
        
        return $nbr_hours;
    }

    
    public static function module_hours($etudiant_id, $module_id)
    {
        $etudiant = Etudiant::findOrFail($etudiant_id);
        $module = Module::findOrFail($module_id);
        $seances = $etudiant->sous_groupe->seances;
        $nbr_hours = 0;
        foreach ($seances as $seance)
            if ($seance->module->id == $module_id)
                $nbr_hours += $seance->duration;
               
        return $nbr_hours;
    }

    public static function module_non_assisted_hours($etudiant_id, $module_id)
    {
        $etudiant = Etudiant::findOrFail($etudiant_id);
        $module = Module::findOrFail($module_id);
        $absences = $etudiant->absences;
        $nbr_hours = 0;
        foreach ($absences as $absence)
            if ($absence->seance->module->id == $module_id)
                $nbr_hours += $absence->seance->duration;
               
        return $nbr_hours;
    }

    public static function module_justified_hours($etudiant_id, $module_id)
    {
        $etudiant = Etudiant::findOrFail($etudiant_id);
        $module = Module::findOrFail($module_id);
        $absences = $etudiant->absences;
        $nbr_hours = 0;
        foreach ($absences as $absence)
            if ($absence->seance->module->id == $module_id && $absence->is_justified)
                $nbr_hours += $absence->seance->duration;
               
        return $nbr_hours;
    }

    public static function module_non_justified_hours($etudiant_id, $module_id)
    {
        $etudiant = Etudiant::findOrFail($etudiant_id);
        $module = Module::findOrFail($module_id);
        $absences = $etudiant->absences;
        $nbr_hours = 0;
        foreach ($absences as $absence)
            if ($absence->seance->module->id == $module_id && !$absence->is_justified)
                $nbr_hours += $absence->seance->duration;
               
        return $nbr_hours;
    }

    
    public static function total_hours($etudiant_id)
    {
        $etudiant = Etudiant::findOrFail($etudiant_id);
        // $modules = $etudiant->sous_groupe->groupe->filiere->modules;
        $seances = $etudiant->sous_groupe->seances;
        $nbr_hours = 0;
        foreach ($seances as $seance)
            $nbr_hours += $seance->duration;
               
        return $nbr_hours;
    }

    
    public static function total_absented_hours($etudiant_id)
    {
        $etudiant = Etudiant::findOrFail($etudiant_id);
        // $modules = $etudiant->sous_groupe->groupe->filiere->modules;
        $absences = $etudiant->absences;
        $nbr_hours = 0;
        foreach ($absences as $absence)
            $nbr_hours += $absence->seance->duration;
               
        return $nbr_hours;
    }
    
    public static function total_justified_hours($etudiant_id)
    {
        $etudiant = Etudiant::findOrFail($etudiant_id);
        // $modules = $etudiant->sous_groupe->groupe->filiere->modules;
        $absences = $etudiant->absences;
        $nbr_hours = 0;
        foreach ($absences as $absence)
            if ($absence->is_justified)
                $nbr_hours += $absence->seance->duration;
               
        return $nbr_hours;
    }
    
    public static function total_non_justified_hours($etudiant_id)
    {
        $etudiant = Etudiant::findOrFail($etudiant_id);
        // $modules = $etudiant->sous_groupe->groupe->filiere->modules;
        $absences = $etudiant->absences;
        $nbr_hours = 0;
        foreach ($absences as $absence)
            if (!$absence->is_justified)
                $nbr_hours += $absence->seance->duration;
               
        return $nbr_hours;
    }
}
