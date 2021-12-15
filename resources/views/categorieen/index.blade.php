@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('categorieenController@create') }}" class="btn btn-primary" style="margin-bottom: 10px">
                   Nieuw Categorieën Maken
                </a>
                {{-- titel van de form --}}
                <div class="card">
                    <div class="card-header">
                        Categorieën
                    </div>
                    {{-- informatie in de form --}}
                    <div class="card-body" style="padding: 0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Naam</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorieen as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->naam }}</td>
                                        <td>
                                            {{-- wijziging de naam en de omschrijving van de vak --}}
                                            <a href="{{route('categorieenController@update', ['model' => $item->id] )}}" class="btn btn-sm btn-primary">
                                                Wijziging
                                            </a>
                                            {{-- verwijderen de vak --}}
                                            <a href="{{route('categorieenController@postDelete', ['model' => $item->id] )}}" onclick="return confirm('Weet je zeker  wilt verwijderen?')" class="btn btn-sm btn-danger">
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