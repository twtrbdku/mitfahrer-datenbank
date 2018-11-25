@extends('layouts.app')

@section('content')
<form method="POST" action="" class="needs-validation" novalidate>
@csrf
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 mb-3">
			<div class="row">
				<div class="col-lg-6">
				</div>
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" class="form-control" name="search" placeholder="Fahrt suchen...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Suchen</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Mitfahrgelegenheiten</div>

				<div class="card-body">
					@if(count($journey) > 0)
					@foreach($journey as $single)
					<div class="row">
						<div class="col-sm-12">
							<div>{{ date('d.m.Y',strtotime($single->starting_at)) }}</div>
							<div>von: {{ $single->from_location }}</div>
							<div>nach: {{ $single->to_location }}</div>
						</div>
						<div class="col-sm-12 text-center">
							<div><b>{{$single->payment_description}}</b></div>
							<div>{{count($single->users)}}/{{$single->passenger_limit}}</div>
						</div>
						<div class="col-sm-12 text-center">
							<div>Raucher: {{($single->is_smoker) ? 'ja' : 'nein'}}</div>
							
						</div>
						<div class="col-sm-12">
							<a href="{{route('journey.book',$single)}}" type="button" class="btn btn-primary btn-lg btn-block">Buchen</a>
						</div>
					</div>
					<hr>
					@endforeach
					@else
					<div class="row">
						<div class="col-sm-12">
							Es wurden keine Fahrten gefunden
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
</form>
@endsection