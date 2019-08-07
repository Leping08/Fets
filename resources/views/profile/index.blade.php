@extends('layouts.app')

@section('content')
    <div class="items-center p-2">
        <div class="sm:w-1/1 md:w-2/3 md:mx-auto">
            <ul>
                <li class="mb-2"><span class="font-bold">Name:</span> <span class="text-gray-800">{{$user->name}}</span></li>
                <li class="mb-2"><span class="font-bold">Email:</span> <span class="text-gray-800">{{$user->email}}</span></li>
                <li class="mb-2"><span class="font-bold">Join Date:</span> <span class="text-gray-800">{{$user->created_at->toFormattedDateString()}}</span></li>
            </ul>
        </div>
    </div>
@endsection
