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
}
