@extends('layouts.app')

@section('content')
    <div class="w-full items-center mx-4">
        <div class="sm:w-1/1 md:w-4/5 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white border border-2 rounded w-full">
                <weight-chart :measurements="{{json_encode($measurements)}}" :days="{{json_encode($days)}}"></weight-chart>
            </div>

            @if($days_missing_data_classes)
                <div class="flex flex-col break-words bg-white border border-2 rounded- shadow-md my-6">
                    <div class="rounded-t overflow-hidden shadow">
                        <div class="font-semibold bg-indigo-500 text-gray-100 py-3 px-6 mb-0">
                            Missing Data
                        </div>
                    </div>
                    <div class="p-6">
                        @foreach($days_missing_data_classes as $day => $measurements)
                            <div class="m-2 text-gray-700">
                                <div class="my-2">
                                    {{ \Carbon\Carbon::parse($day)->format('m/d/yy') }}
                                </div>
                                <div class="my-2 mx-4 text-red-700">
                                    @if(! $measurements->contains('Food'))
                                        Food <br />
                                    @endif
                                    @if(! $measurements->contains('Sleep'))
                                        Sleep <br />
                                    @endif
                                    @if(! $measurements->contains('Water'))
                                        Water <br />
                                    @endif
                                    @if(! $measurements->contains('Weight'))
                                        Weight <br />
                                    @endif
                                    @if(! $measurements->contains('Workout'))
                                        Workout <br />
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md my-6">
                <div class="rounded-t overflow-hidden shadow">
                    <div class="font-semibold bg-indigo-500 text-gray-100 py-3 px-6 mb-0">
                        Add Measurement
                    </div>
                </div>
                <div class="w-full">
                    <form method="POST" action="/measurements" class="p-6">
                        @csrf()
                        <div class="mb-5">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="date">
                                Date
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" id="date" name="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                            @error('date')
                                <div class="text-red-500 text-xs italic mt-4">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="metric">
                                Metric
                            </label>
                            <select id="metric" name="metric" class="shadow mt-1 block border rounded w-full text-gray-700  pl-2 pr-10 py-2 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                                <option value="none" selected disabled hidden>Select a value</option>
                                <option value="food">Food</option>
                                <option value="sleep">Sleep</option>
                                <option value="water">Water</option>
                                <option value="weight">Weight</option>
                                <option value="workout">Workout</option>
                            </select>
                            @error('metric')
                                <div class="text-red-500 text-xs italic mt-4">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="value">
                                Value
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="value" name="value" type="number" step=".01">
                            @error('value')
                                <div class="text-red-500 text-xs italic mt-4">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
