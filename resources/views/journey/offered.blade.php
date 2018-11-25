@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Eigene Fahrten</div>

                <div class="card-body">
                	@if(count($journey) > 0 )
                    @foreach($journey as $single)
                    @if($single->starting_at > Carbon\Carbon::now())
                    <div class="row">
                        <div class="col-sm-8">
                            <div>{{ date('d.m.Y',strtotime($single->starting_at)) }}</div>
                            <div>von: {{ $single->from_location }}</div>
                            <div>nach: {{ $single->to_location }}</div>
                        </div>
                        <div class="col-sm-4">
                            <div><b>{{$single->payment_description}}</b></div>
                            <div>{{count($single->users)}}/{{$single->passenger_limit}}</div>
                        </div>
                        <div class="col-sm-12"><a href="{{route('journey.offered.cancel',$single)}}" type="button" class="btn btn-danger btn-lg btn-block">Löschen</a></div>
                    </div>
                    <hr>
                    @endif
                    @endforeach
                    @else
                    <div class="row">
                    	<div class="col-sm-8">
                    		Keine Fahrten gefunden!
                    	</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
