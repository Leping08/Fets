@extends('layouts.app')

@section('content')
    <div class="items-center p-2">
        <div class="sm:w-1/1 md:w-2/3 md:mx-auto">
            <table class="text-left w-full">
                <thead class="bg-indigo-400 flex text-white w-full rounded">
                    <tr class="flex w-full p-2">
                        <th class="p-4 w-1/5">Date</th>
                        <th class="p-4 w-1/5">Calories In</th>
                        <th class="p-4 w-1/5">Calories Out</th>
                        <th class="p-4 w-1/5">Weight</th>
                        <th class="p-4 w-1/5"></th>
                    </tr>
                </thead>
                <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full bg-white border rounded">
                    @foreach($measurements as $measurement)
                        <tr class="flex w-full p-2 border-b border-grey-light rounded-b">
                            <td class="p-4 w-1/5">{{ $measurement->date->toFormattedDateString() }}</td>
                            <td class="p-4 w-1/5">{{ $measurement->calories_eaten }}</td>
                            <td class="p-4 w-1/5">{{ $measurement->calories_burned }}</td>
                            <td class="p-4 w-1/5">{{ $measurement->weight }}</td>
                            <td class="p-4 w-1/5"><i class="mdi mdi-pencil text-xl pr-2"></i> <i class="mdi mdi-delete text-xl pr-2"></i></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
