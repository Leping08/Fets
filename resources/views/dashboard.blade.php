@extends('layouts.app')

@section('content')
    <div class="items-center p-2">
        <div class="sm:w-1/1 md:w-4/5 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

{{--            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mt-6 mb-6">--}}
{{--                <div class="rounded overflow-hidden shadow-lg">--}}
{{--                    <div class="font-semibold bg-indigo-500 text-gray-100 py-3 px-6 mb-0">--}}
{{--                        Goal--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">--}}
{{--                    <div class="mb-5">--}}
{{--                        <goal></goal>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}



            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                <weight-chart :measurements="{{json_encode($measurements)}}"></weight-chart>
            </div>

{{--                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mt-6 mb-6">--}}
{{--                    <div class="rounded overflow-hidden shadow-lg">--}}
{{--                        <div class="font-semibold bg-indigo-400 text-gray-900 py-3 px-6 mb-0">--}}
{{--                            View Other People--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="w-full">--}}
{{--                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">--}}
{{--                            <div class="mb-5">--}}
{{--                                <label class="block text-gray-700 text-sm font-bold mb-2" for="weight">--}}
{{--                                    Users--}}
{{--                                </label>--}}
{{--                                <select class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="grid-state">--}}
{{--                                    <option>New Mexico</option>--}}
{{--                                    <option>Missouri</option>--}}
{{--                                    <option>Texas</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mt-6 mb-6">--}}
{{--                <div class="rounded overflow-hidden shadow-lg">--}}
{{--                    <div class="font-semibold bg-indigo-500 text-gray-100 py-3 px-6 mb-0">--}}
{{--                        Add Measurement--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full">--}}
{{--                    <form method="POST" action="/measurements" class="bg-white shadow-md rounded px-8 pt-6 pb-8">--}}
{{--                        @csrf()--}}
{{--                        <div class="mb-5">--}}
{{--                            <label class="block text-gray-700 text-sm font-bold mb-2" for="date">--}}
{{--                                Date--}}
{{--                            </label>--}}
{{--                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" id="date" name="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">--}}
{{--                        </div>--}}
{{--                        <div class="mb-5">--}}
{{--                            <label class="block text-gray-700 text-sm font-bold mb-2" for="weight">--}}
{{--                                Weight <span class="text-xs text-gray-500">lbs</span>--}}
{{--                            </label>--}}
{{--                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="weight" name="weight" type="number" step=".01" placeholder="135.26">--}}
{{--                        </div>--}}
{{--                        <div class="mb-5">--}}
{{--                            <label class="block text-gray-700 text-sm font-bold mb-2" for="calories_burned">--}}
{{--                                Calories Burned--}}
{{--                            </label>--}}
{{--                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="calories_burned" name="calories_burned" type="number" placeholder="500">--}}
{{--                        </div>--}}
{{--                        <div class="mb-5">--}}
{{--                            <label class="block text-gray-700 text-sm font-bold mb-2" for="calories_eaten">--}}
{{--                                Calories Eaten--}}
{{--                            </label>--}}
{{--                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="calories_eaten" name="calories_eaten" type="number" placeholder="1400">--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">--}}
{{--                                Submit--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
