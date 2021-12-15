@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('spellendevController@postUpdate') }}" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">Spellen</div>
                        {{-- wijziging de vak de naam en omschrijving --}}
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="model" value="{{ $model->id }}">
                            <div class="form-group">
                                <label for="name">Naam</label>
                                <input name="naam" type="text" class="form-control" value="{{ old('naam', $model->naam) }}">
                                @if ($errors->has('naam'))
                                    <small class="text-danger">{{ $errors->first('naam') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">categorieen_id</label>
                                <input name="categorieen_id" type="text" class="form-control" value="{{ old('categorieen_id', $model->categorieen_id) }}">
                                
                                @if ($errors->has('categorieen_id'))
                                    <small class="text-danger">{{ $errors->first('categorieen_id') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Leeftijd</label>
                                <input name="leeftijd" type="text" class="form-control" value="{{ old('leeftijd', $model->leeftijd) }}">
                                
                                @if ($errors->has('leeftijd'))
                                    <small class="text-danger">{{ $errors->first('leeftijd') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="beschrijving">Beschrijving</label>
                                <textarea name="beschrijving" type="text" class="form-control">{!! old('beschrijving',$model->beschrijving) !!}</textarea>

                                @if ($errors->has('beschrijving'))
                                    <small class="text-danger">{{ $errors->first('beschrijving') }}</small>
                                @endif
                            </div>
                            <label for="foto">Spelfoto</label>
                            <br>
                            <input type="file"
                             id="foto" name="foto"
                            accept="image/png, image/jpeg">

                            @if ($errors->has('foto'))
                                <small class="text-danger">{{ $errors->first('foto') }}</small>
                            @endif

                            <div class="form-group">
                                <label for="Iframe">Iframe</label>
                                <textarea class="form-control" name="iframe" rows="10"> {!! old('iframe',$model->iframe) !!}</textarea>
                                @if ($errors->has('Iframe'))
                                    <small class="text-danger">{{ $errors->first('Iframe') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- terug naar de overzicht pagnia --}}
                            <a href="{{route('categorieenController@index')}}" class="btn btn-sm btn-danger">
                            Terug
                             </a>
                            <button type="submit" class="btn btn-sm btn-success" style="float: right;">
                                Opslaan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
