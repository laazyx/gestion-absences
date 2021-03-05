@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Etudiants') }}</div>

                <div class="card-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Matricule</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Filière</th>
                        <th scope="col">Sous Groupe</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($etudiants as $etudiant)
                      <tr>
                        <th scope="row">{{ $etudiant->matricule }}</th>
                        <td>{{ $etudiant->first_name }}</td>
                        <td>{{ $etudiant->last_name }}</td>
                        <td>{{ $etudiant->sous_groupe->groupe->filiere->description }}</td>
                        <td>{{ $etudiant->sous_groupe->label }}</td>
                        <td>
                          <a href="/etudiants/{{ $etudiant->id }}/absences" class="btn btn-outline-primary" role="button">Absences</a>
                        </td>
                      </tr>
                    @endforeach 
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
