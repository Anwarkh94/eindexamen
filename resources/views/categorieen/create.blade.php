@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- de knop nieuw categorieen maken   --}}
                <form action="{{route('categorieenController@postCreate')}}" method="POST">
                    <div class="card">
                        <div class="card-header">Categorieën</div>

                        <div class="card-body">
                            @csrf
                            {{-- naam van de Categoriee --}}
                            <div class="form-group">
                                <label for="name">Naam</label>
                                <input name="naam" type="text" class="form-control" value="{{ old('naam') }}">
                                @if ($errors->has('naam'))
                                    <small class="text-danger">{{ $errors->first('naam') }}</small>
                                @endif
                            </div>

                        </div>
                        
                        <div class="card-footer">
                            {{-- terug naar de overzicht pagnia --}}
                             <a href="{{route('categorieenController@index')}}" class="btn btn-sm btn-danger">
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
