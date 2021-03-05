@extends('layouts.app')
<?php use \App\Http\Controllers\ParentController;  ?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Absence de ') }} {{ $etudiant->first_name }} {{ $etudiant->last_name }}</div>

                <div class="card-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Module</th>
                        <th scope="col">Nbr Heures Enseignées</th>
                        <th scope="col">Nbr Heures Absentées</th>
                        <th scope="col">Nbr Heures Absentées avec justification</th>
                        <th scope="col">Nbr Heures Absentées sans justification</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($modules as $module)
                      <tr>
                        <th scope="row">{{ $module->label }}</th>
                        <td>{{ ParentController::module_hours($etudiant->id, $module->id) }}</td>
                        <td>{{ ParentController::module_non_assisted_hours($etudiant->id, $module->id) }}</td>
                        <td>{{ ParentController::module_justified_hours($etudiant->id, $module->id) }}</td>
                        <td>{{ ParentController::module_non_justified_hours($etudiant->id, $module->id) }}</td>
                      </tr>
                    @endforeach
                      <tr>
                        <th scope="row">TOTAL</th>
                        <td>{{ ParentController::total_hours($etudiant->id) }}</td>
                        <td>{{ ParentController::total_absented_hours($etudiant->id) }}</td>
                        <td>{{ ParentController::total_justified_hours($etudiant->id) }}</td>
                        <td>{{ ParentController::total_non_justified_hours($etudiant->id) }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
