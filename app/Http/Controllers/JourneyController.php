<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User2Journey;
use App\Journey;
use App\User;

class JourneyController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$user = Auth::user();

		if($request->isMethod('post') && !empty($request->search)){
			$journey = Journey::where('starting_at','>', Carbon::now()->format('Y-m-d'))
			->whereRaw("(from_location like '%".$request->search."%' OR  to_location like '%".$request->search."%')")
			->get();
		}else{
			$journey = Journey::where('starting_at','>', Carbon::now()->format('Y-m-d'))->get();
		}

		return view('journey.search', [
			'journey' => $journey,
		]);

	}

	public function book(Request $request){
		$user = Auth::user();
		if(isset($request->id)){
			$journey = Journey::find($request->id);
			if(!$journey){
				return redirect()->route('journey.booked')->with('error', ['Keine Fahrt gefunden' => 'Es konnte keine passende Fahrt gefunden werden!']);
			}
			if($journey->user_id == $user->id){
				return redirect()->route('journey.booked')->with('error', ['Eigene Fahrt' => 'Sie können sich nicht für Ihre eigene Fahrt anmelden']);
			}
			if(count($journey->users) == $journey->passenger_limit){
				return redirect()->route('journey.booked')->with('error', ['Ausgebucht' => 'Es sind leider keine Plätze mehr frei']);
			}
			if(User2Journey::where('journey_id', $request->id)->where('user_id',$user->id)->exists()){
				return redirect()->route('journey.booked')->with('error', ['Bereits gebucht' => 'Sie sind für die gewählte Fahrt bereits angemeldet']);
			}


			$user2Journey = new User2Journey;
			$user2Journey->user_id = $user->id;
			$user2Journey->journey_id = $request->id;

			if($user2Journey->save()){
				return redirect()->route('journey.booked')->with('status', ['Erfolgreich' => 'Sie wurden erfolgreich für die Fahrt angemeldet']);
			}

		}

		return view('journey.search');
	}

	public function booked(Request $request){
		$user = Auth::user();

		$journey = $user->bookedJourneys;

		return view('journey.booked',[
			'journey' => $journey,
		]);
	}

	public function create(Request $request){
		$user = Auth::user();

		if(!$request->isMethod('post')){
			return view('journey.create',[
				'journey' => new Journey,
			]);
		}
		$validatedData = $request->validate([
			'from_location'         => 'required|string|max:255',
			'to_location'			=> 'required|string|max:255',
			'passenger_limit'		=> 'required|numeric',
			'passenger_limit'		=> 'required|numeric',
			'payment_description'   => 'required|string|max:255',
			'payment_description'   => 'required|string|max:255',
			'starting_at'						=> 'required|date'
		]);
		$journey = new Journey;
		$journey->user_id = $user->id;
		$journey->from_location = $request->from_location;
		$journey->to_location = $request->to_location;
		$journey->passenger_limit = $request->passenger_limit;
		$journey->passenger_limit = $request->passenger_limit;
		$journey->payment_description = $request->payment_description;
		$journey->starting_at = $request->starting_at;
		$journey->is_smoker = ($request->has('is_smoker')) ? true : false;

		if($journey->save()){
			return redirect()->route('journey.offered')->with('status', ['Erfolgreich' => 'Die Fahrt wurde erfolgreich erstellt']);
		}
	}

	public function offered(Request $request){
		$user = Auth::user();
		$journey = $user->offeredJourneys;

		return view('journey.offered',[
			'journey' => $journey,
		]);
	}

	public function cancel_offered(Request $request){
		$user = Auth::user();

		if(!isset($request->id) || !Journey::where('id', $request->id)->exists()){
			return redirect()->route('journey.offered')->with('error', ['Keine Fahrt gefunden' => 'Es konnte keine passende Fahrt gefunden werden!']);
		}

		$journey = Journey::find($request->id);

		if($journey->user_id != $user->id){
			return redirect()->route('journey.offered')->with('error', ['Ungültig' => 'Sie können nur Ihre eigenen Fahrten löschen']);
		}

		if($journey->delete()){
			return redirect()->route('journey.offered')->with('status', ['Erfolgreich' => 'Die von Ihnen angebotene Fahrt wurde entfernt']);
		}
	}

	public function cancel_booked(Request $request){
		$user = Auth::user();

		if(!isset($request->id) || !User2Journey::where('id',$request->id)->where('user_id',$user->id)->exists()){
			return redirect()->route('journey.booked')->with('error', ['Keine Fahrt gefunden' => 'Es konnte keine passende Fahrt gefunden werden!']);
		}

		$user2Journey = User2Journey::where('id',$request->id)->where('user_id',$user->id)->first();

		if($user2Journey->delete()){
			return redirect()->route('journey.booked')->with('status', ['Erfolgreich' => 'Die von Ihnen gebuchte Fahrt wurde storniert']);
		}
	}

}
