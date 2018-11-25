@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Anstehende Fahrten</div>

                <div class="card-body">
                	@if(count($journey) > 0 )
                    @foreach($journey as $single)
                    @if($single->journey->starting_at > Carbon\Carbon::now())
                    <div class="row">
                        <div class="col-sm-8">
                            <div>{{ date('d.m.Y',strtotime($single->journey->starting_at)) }}</div>
                            <div>von: {{ $single->journey->from_location }}</div>
                            <div>nach: {{ $single->journey->to_location }}</div>
                        </div>
                        <div class="col-sm-4">
                            <div><b>{{$single->journey->payment_description}}</b></div>
                            <div>{{count($single->journey->users)}}/{{$single->journey->passenger_limit}}</div>
                        </div>
                        <div class="col-sm-12"><a href="{{route('journey.booked.cancel',$single)}}" type="button" class="btn btn-danger btn-lg btn-block">Stornieren</a></div>
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
