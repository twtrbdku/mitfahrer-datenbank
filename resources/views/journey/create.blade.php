@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fart anlegen') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('journey.create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="from_location" class="col-md-4 col-form-label text-md-right">{{ __('Von') }}</label>

                            <div class="col-md-6">
                                <input id="from_location" type="text" class="form-control{{ $errors->has('from_location') ? ' is-invalid' : '' }}" name="from_location" value="{{ (old('from_location')) ? old('name') : $journey->from_location }}" required autofocus>

                                @if ($errors->has('from_location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('from_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="to_location" class="col-md-4 col-form-label text-md-right">{{ __('Nach') }}</label>

                            <div class="col-md-6">
                                <input id="to_location" type="text" class="form-control{{ $errors->has('to_location') ? ' is-invalid' : '' }}" name="to_location" value="{{ (old('to_location')) ? old('name') : $journey->to_location }}" required autofocus>

                                @if ($errors->has('to_location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('to_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passenger_limit" class="col-md-4 col-form-label text-md-right">{{ __('Anzahl Mitfahrer') }}</label>

                            <div class="col-md-6">
                                <input id="passenger_limit" type="number" class="form-control{{ $errors->has('passenger_limit') ? ' is-invalid' : '' }}" name="passenger_limit" value="{{ (old('passenger_limit')) ? old('name') : $journey->passenger_limit }}" required autofocus>

                                @if ($errors->has('passenger_limit'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('passenger_limit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_smoker" id="remember" {{ old('is_smoker') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="is_smoker">
                                        {{ __('Raucher?') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="starting_at" class="col-md-4 col-form-label text-md-right">{{ __('Startzeit') }}</label>

                            <div class="col-md-6">
                                <input id="starting_at" type="datetime-local" class="form-control{{ $errors->has('starting_at') ? ' is-invalid' : '' }}" name="starting_at" value="{{ (old('starting_at')) ? old('name') : $journey->starting_at }}" required autofocus>

                                @if ($errors->has('starting_at'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('starting_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_description" class="col-md-4 col-form-label text-md-right">{{ __('Preis') }}</label>

                            <div class="col-md-6">
                                <input id="payment_description" type="text" class="form-control{{ $errors->has('payment_description') ? ' is-invalid' : '' }}" name="payment_description" value="{{ (old('payment_description')) ? old('name') : $journey->payment_description }}" required autofocus>

                                @if ($errors->has('payment_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('payment_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Speichern') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection