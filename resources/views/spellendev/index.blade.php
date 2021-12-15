@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('spellendevController@create')}}" class="btn btn-primary" style="margin-bottom: 10px">
                   Nieuw Spel Toevoegen
                </a>
                {{-- titel van de form --}}
                <div class="card">
                    <div class="card-header">
                        Spellen
                    </div>
                    {{-- informatie in de form --}}
                    <div class="card-body" style="padding: 0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>id</th>
                                    <th>Naam</th>
                                    <th>Categorieen</th>
                                    <th>Leeftijd</th>
                                    <th>Beschrijving</th>
                                    <th>Acties</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($spellendev as $item)
                                    <tr>
                                        <td class="align-middle">
                                            <img width="70px" src="{{asset('uploads/' . $item->foto)}}" alt="">
                                        </td>
                                        <td class="align-middle">{{ $item->id }}</td>
                                        <td class="align-middle">{{ $item->naam }}</td>
                                        <td class="align-middle">{{$item->Category ? $item->Category->naam : '----'}}</td>
                                        <td class="align-middle">{{$item->leeftijd}}</td>
                                        <td class="align-middle">{{$item->beschrijving}}</td>
                                        
                                        <td class="align-middle">
                                            {{-- wijziging de naam en de omschrijving van de vak --}}
                                            <a href="{{route('spellendevController@update', ['model' => $item->id] )}}" class="btn btn-sm btn-primary">
                                                Wijziging
                                            </a>
                                            {{-- verwijderen de vak --}}
                                            <a href="{{route('spellendevController@postDelete', ['model' => $item->id] )}}" onclick="return confirm('Weet je zeker  wilt verwijderen?')" class="btn btn-sm btn-danger">
                                                Verwijderen
                                            </a>
                                            <a href="#" onclick="return confirm('Weet je zeker  ?')" class="btn btn-sm btn-danger">
                                                Status
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