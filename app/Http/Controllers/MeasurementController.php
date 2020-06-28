<?php

namespace App\Http\Controllers;

use App\Food;
use App\Sleep;
use App\Water;
use App\Weight;
use App\Workout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeasurementController extends Controller
{
    public function index()
    {
        $user_id = 1; //TODO this is hard coded
        $data = collect();

        $data->add([
            'food' => Food::where('user_id', $user_id)->orderBy('date','asc')->get(),
            'sleep' => Sleep::where('user_id', $user_id)->orderBy('date','asc')->get(),
            'water' => Water::where('user_id', $user_id)->orderBy('date','asc')->get(),
            'weight' => Weight::where('user_id', $user_id)->orderBy('date','asc')->get(),
            'workout' => Workout::where('user_id', $user_id)->orderBy('date','asc')->get(),
        ]);

        return view('dashboard', ['measurements' => $data[0]]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => ['required', 'date'],
            'metric' => ['required', 'in:food,sleep,water,weight,workout'],
            'value' => ['required', 'numeric', 'between:0,5000'],
        ]);

        //$data['user_id'] = Auth::id();
        $user_id = 1; //TODO this is hard coded for now
        $date = Carbon::parse($data['date']);

        if ($data['metric'] === 'food') {
            Food::create([
                'date' => $date,
                'user_id' => $user_id,
                'calories' => $data['value']
            ]);
        } elseif ($data['metric'] === 'sleep') {
            Sleep::create([
                'date' => $date,
                'user_id' => $user_id,
                'hours' => $data['value']
            ]);
        } elseif ($data['metric'] === 'water') {
            Water::create([
                'date' => $date,
                'user_id' => $user_id,
                'ounces' => $data['value']
            ]);
        } elseif ($data['metric'] === 'weight') {
            Weight::create([
                'date' => $date,
                'user_id' => $user_id,
                'pounds' => $data['value']
            ]);
        } elseif ($data['metric'] === 'workout') {
            Workout::create([
                'date' => $date,
                'user_id' => $user_id,
                'calories' => $data['value']
            ]);
        }

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
