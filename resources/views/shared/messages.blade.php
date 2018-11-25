@if (session('status'))
	@if(is_array(session('status')))
		@foreach(session('status') as $topic => $status)
		<div class="container mt-3 pl-0 pr-0 mb-0">
	    	<div class="row justify-content-center">
	        	<div class="col-md-8">
					<div class="alert alert-success mb-0">
			@if(!is_numeric($topic))

					<b>{{$topic}}</b> - {{ $status }}
			@else
					{{ $status }}
			@endif

					</div>
				</div>
			</div>
		</div>
		@endforeach
	@else
	<div class="container mt-3 pl-0 pr-0 mb-0">
    	<div class="row justify-content-center">
        	<div class="col-md-8">
	    		<div class="alert alert-success mb-0">
					{{ session('status') }}
				</div>
			</div>
		</div>
	</div>
	@endif

@endif
@if (session('error'))
	@if(is_array(session('error')))
		@foreach(session('error') as $topic => $error)
		<div class="container mt-3 pl-0 pr-0 mb-0">
    		<div class="row justify-content-center">
        		<div class="col-md-8">
					<div class="alert alert-danger mb-0">
			@if(!is_numeric($topic))

					<b>{{$topic}}</b> - {{ $error }}
			@else
					{{ $error }}
			@endif

					</div>
				</div>
			</div>
		</div>
		@endforeach
	@else
	<div class="container mt-3 pl-0 pr-0 mb-0">
    	<div class="row justify-content-center">
        	<div class="col-md-8">
	    		<div class="alert alert-danger mb-0">
					{{ session('error') }}
				</div>
			</div>
		</div>
	</div>
	@endif

@endif

@if(session('infopopup'))
	<script>
		$(document).ready(function(){
			custom_info('{{session('infopopup')}}', '{{session('infopopup_header')}}');
        });
	</script>
@endif