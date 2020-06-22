<?php

namespace App\Http\Controllers;

use App\Food;
use App\Sleep;
use App\Water;
use App\Weight;
use App\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeasurementController extends Controller
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

    public function index()
    {
        $user_id = 1;
        $data = collect();

        $data->add([
            'food' => Food::where('user_id', $user_id)->get(),
            'sleep' => Sleep::where('user_id', $user_id)->get(),
            'water' => Water::where('user_id', $user_id)->get(),
            'weight' => Weight::where('user_id', $user_id)->get(),
            'workout' => Workout::where('user_id', $user_id)->get(),
        ]);

        return view('dashboard', ['measurements' => $data[0]]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric|between:0,500.99',
            'calories_burned' => 'required|numeric|between:0,5000',
            'calories_eaten' => 'required|numeric|between:0,5000'
        ]);

        $data['user_id'] = Auth::id();

        Measurement::create($data);

        return redirect('dashboard');
    }

    public function all()
    {
        $measurements = Measurement::where('user_id', Auth::id())->get();
        return view('measurements.all', compact('measurements'));
    }

    public function edit(Measurement $measurement)
    {
        if($measurement->user_id === Auth::id()){
            return view('measurements.edit', compact('measurement'));
        } else {
            return "<iframe src=\"https://giphy.com/embed/22CEvbj04nLLq\" width=\"480\" height=\"411\" frameBorder=\"0\" class=\"giphy-embed\" allowFullScreen></iframe><p><a href=\"https://giphy.com/gifs/funny-the-office-rage-22CEvbj04nLLq\">via GIPHY</a></p>";
            //return "Uh uh grilllll, not in my housssseeeee";
            //return back();
        }
    }
}
