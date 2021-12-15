@extends('layouts.app')
{{-- overzicht pagina examen --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="#" class="btn btn-primary" style="margin-bottom: 10px">
                    {{ __('strings.exams_create') }}
                </a>
                <div class="card">
                    <div class="card-header">
                        Gebruikers
                    </div>

                    <div class="card-body" style="padding: 0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Naam</th>
                                    <th>E-mail</th>
                                    <th>Wachtwoord</th>
                                    <th>Rol</th>
                                    <th>Tijdslimiet</th>
                                    <th>acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gebruikers as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->Material ? $item->Material->name : '----' }}</td>
                                        <td>{{ $item->ClassRoom ? $item->ClassRoom->name : '----' }}</td>
                                        <td>{{ $item->starts_at ?? '------' }}</td>
                                        <td>{{ $item->ends_at ?? '------' }}</td>
                                        <td>{{ $item->description ?? '------' }}</td>
                                        <td>
                                            <a href="{{route('gebruikersController@update', ['model' => $item->id] )}}" class="btn btn-sm btn-primary">
                                                Wijziging
                                            </a>
                                            <a href="{{ route('gebruikersController@postDelete', ['model' => $item->id]) }}" onclick="return confirm('Weet je zeker verwijderen?')" class="btn btn-sm btn-danger">
                                                Verwijderen
                                            </a>
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
