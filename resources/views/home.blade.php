@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('EMSI Casablanca') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @guest
                        {{ __('Bienvenue sur notre plateforme de gestion d\'absences des étudiants de l\'EMSI Casablanca.') }}
                    @else
                        {{ __('Bienvenue '.Auth::user()->first_name.' '.Auth::user()->last_name.' sur notre plateforme de gestion d\'absences des étudiants de l\'EMSI Casablanca.') }}
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
