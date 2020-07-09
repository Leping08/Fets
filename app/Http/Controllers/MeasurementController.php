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

        $data = collect([
            'food' => Food::where('user_id', $user_id)->orderBy('date','asc')->get(),
            'sleep' => Sleep::where('user_id', $user_id)->orderBy('date','asc')->get(),
            'water' => Water::where('user_id', $user_id)->orderBy('date','asc')->get(),
            'weight' => Weight::where('user_id', $user_id)->orderBy('date','asc')->get(),
            'workout' => Workout::where('user_id', $user_id)->orderBy('date','asc')->get(),
        ]);

        $days = $data->flatten(1)->groupBy('date');

        //Filter out days with all the data
        $days_missing_data = $days->filter(function ($item) {
            return $item->count() < 5;
        });

        //Add classes to day for data we have
        $days_missing_data_classes = $days_missing_data->map(function ($day) use ($user_id) {
            return $day->map(function ($measurement) {
                return class_basename($measurement);
            });
        });

        return view('dashboard', ['measurements' => $data, 'days_missing_data_classes' => $days_missing_data_classes]);
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
}
