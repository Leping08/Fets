<?php

namespace App\Http\Controllers;

use App\Measurement;
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
        $measurements = Measurement::where('user_id', Auth::id())->get();
        return view('dashboard', compact('measurements'));
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
