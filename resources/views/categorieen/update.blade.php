@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('categorieenController@postUpdate') }}" method="POST">
                    <div class="card">
                        <div class="card-header">vakken</div>
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


                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-success">
                                Opslaan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
