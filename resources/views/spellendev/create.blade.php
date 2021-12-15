@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- de knop nieuw spel maken   --}}
                <form action="{{route('spellendevController@postCreate')}}" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">Spel</div>

                        <div class="card-body">
                            @csrf
                            {{-- naam van de spel --}}
                            <div class="form-group">
                                <label for="name">Naam</label>
                                <input name="naam" type="text" class="form-control" value="{{ old('naam') }}">
                                @if ($errors->has('naam'))
                                    <small class="text-danger">{{ $errors->first('naam') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="categorieen_id">categorieen</label>
                                <select name="categorieen_id" class="form-control">
                                    <option value="">-- Select --</option>
                                    @foreach ($categorieen as $categorie)
                                        <option value="{{ $categorie->id }}" {!! old('categorieen_id') == $categorie->id ? 'selected=""' : '' !!}>
                                            {{ $categorie->naam }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categorieen_id'))
                                    <small class="text-danger">{{ $errors->first('categorieen_id') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name"> Leeftijd</label>
                                <input name="leeftijd" type="number" min="1" max="18" class="form-control" value="{{ old('number') }}">
                                @if ($errors->has('number'))
                                    <small class="text-danger">{{ $errors->first('number') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="beschrijving">Beschrijving</label>
                                <textarea name="beschrijving" type="text" class="form-control">{!! old('beschrijving') !!}</textarea>
                                @if ($errors->has('beschrijving'))
                                    <small class="text-danger">{{ $errors->first('beschrijving') }}</small>
                                @endif
                            </div>
                            <label for="foto">foto</label>
                            <br>
                            <input type="file"
                             id="foto" name="foto"
                            accept="image/png, image/jpeg">


                            <div class="form-group">
                                <label for="Iframe">Iframe</label>
                                <textarea class="form-control" name="iframe" rows="10"></textarea>
                                @if ($errors->has('Iframe'))
                                    <small class="text-danger">{{ $errors->first('Iframe') }}</small>
                                @endif
                            </div>
                        </div>


                        <div class="card-footer">
                            {{-- terug naar de overzicht pagnia --}}
                             <a href="{{route('spellendevController@index')}}" class="btn btn-sm btn-danger">
                                Terug
                            </a>
                            {{-- opslaan de form --}}
                            <button type="submit" class="btn btn-sm btn-success"style="float: right;">
                                opslaan
                            </button>
                         
                         
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
