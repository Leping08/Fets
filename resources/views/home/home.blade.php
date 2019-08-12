@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/1 flex-1 md:mx-auto p-2">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            <div class="flex flex-wrap items-center sm:mx-4 md:mx-8 lg:mx-12">
                <div class="w-full md:w-1/1 lg:w-1/2 xl:w-2/3">
                    <div class="px-6 text-left md:text-center xl:text-left inline-block align-text-bottom">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl xl:text-4xl font-light leading-tight">Data driven <span class="text-indigo-500 font-normal">weight loss.</span></h1>
                        <p class="mt-6 leading-relaxed sm:text-lg md:text-xl xl:text-lg text-gray-600">
                            Fets allows you to track, analyze, and find patterns about your health.
                        </p>
                        <div class="flex mt-6 justify-start md:justify-center xl:justify-start">
                            <a href="" class="rounded-lg px-4 md:px-5 xl:px-4 py-3 md:py-4 xl:py-3 bg-indigo-500 hover:bg-indigo-600 md:text-lg xl:text-base text-white font-semibold leading-tight shadow-md">Get Started</a>
                            <a href="" class="ml-4 rounded-lg px-4 md:px-5 xl:px-4 py-3 md:py-4 xl:py-3 bg-white hover:bg-gray-100 md:text-lg xl:text-base text-gray-800 font-semibold leading-tight shadow-md">Why Data?</a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/1 lg:w-1/2 xl:w-1/3">
                    <div class="mt-12 xl:mt-0 px-6">
                        <img class="" src="/img/icons/key_points.svg" alt="">
                    </div>
                </div>
            </div>

            <div class="flex flex-col break-words bg-white border border-1 rounded shadow-md m-10">

            </div>

            @php
                $items = collect([
                    [
                        'name' => 'Analyse The Data',
                        'icon' => 'bar_chart.svg',
                        'content' => 'Find and understand trends about your eating, exercise, and weight.',
                        'hashtags' => [
                            'data',
                            'trends',
                            'graphs'
                        ]
                    ],
                    [
                        'name' => 'Compare With Friends',
                        'icon' => 'growth_friends.svg',
                        'content' => 'Push your friends forward by helping them find patterns and comparing data points.',
                        'hashtags' => [
                            'friends',
                            'compete',
                            'encouragement'
                        ]
                    ],
                    [
                        'name' => 'Motivate You and Your Friends',
                        'icon' => 'personal_trainer.svg',
                        'content' => 'Motivate and encourage your friends with challenges.',
                        'hashtags' => [
                            'motivation',
                            'challenges',
                            'kickass'
                        ]
                    ],
                    [
                        'name' => 'Healthy Mind, Healthy Body',
                        'icon' => 'meditating.svg',
                        'content' => 'When your mind is healthy, your body will follow.',
                        'hashtags' => [
                            'feelingood',
                            'lovinlife'
                        ]
                    ]
                ])
            @endphp


            <div class="flex flex-wrap sm:mx-4 md:mx-8 lg:mx-12">
                @foreach($items as $key => $item)

                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
                        <div class="rounded rounded-lg bg-white overflow-hidden shadow-lg m-2 hover:shadow-xl">
                            <img class="w-full p-4" src="/img/icons/{{$item['icon']}}" alt="">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2 text-gray-800 leading-tight">{{$item['name']}}</div>
                                <p class="text-gray-700 text-base">{{$item['content']}}</p>
                            </div>
                            <div class="px-6 py-4">
                                @foreach($item['hashtags'] as $hashtag)
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xs font-semibold text-gray-800 mr-2 shadow">#{{$hashtag}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>


    <div class="flex flex-col break-words bg-white border border-1 rounded shadow-md mt-8 mb-16">

    </div>


    <div class="container mx-auto px-4 mb-10">

        <div class="lg:flex lg:items-center lg:-mx-2">

            <div class="mb-4 lg:mb-0 lg:w-1/3 lg:px-2">
                <div class="text-center border bg-white p-10 rounded-lg hover:shadow-xl">
                    <h2 class="text-lg mb-4">Free</h2>
                    <div class="mb-6">
                        <span class="block text-5xl pb-2">$0</span>
                        <span class="text-sm text-grey">Monthly</span>
                    </div>
                    <div class="border-t border-solid text-sm pb-10">
                        <div class="text-center border-b py-4">
                            10 Websites
                        </div>
                        <div class="text-center border-b py-4">
                            Analytics
                        </div>
                        <div class="text-center border-b py-4">
                            Downtime Alerts
                        </div>
                    </div>
                    <a class="inline-block w-full p-3 border border-indigo-500 rounded-lg px-4 md:px-5 xl:px-4 py-3 md:py-4 xl:py-3 bg-white hover:bg-indigo-500 md:text-lg xl:text-base text-indigo-500 hover:text-white font-semibold leading-tight shadow-md" href="#">Get started</a>
                </div>
            </div>

            <div class="mb-4 lg:mb-0 lg:w-1/3 lg:px-2">
                <div class="text-center border bg-white p-10 lg:py-16 rounded-lg lg:shadow-lg hover:shadow-xl">
                    <h2 class="text-lg mb-4">Basic</h2>
                    <div class="mb-6">
                        <span class="block text-5xl pb-2">$5</span>
                        <span class="text-sm text-grey">Monthly</span>
                    </div>
                    <div class="border-t border-solid text-sm pb-10">
                        <div class="text-center border-b py-4">
                            100 Websites
                        </div>
                        <div class="text-center border-b py-4">
                            API Endpoints
                        </div>
                        <div class="text-center border-b py-4">
                            SSL Monitoring
                        </div>
                    </div>
                    <a class="inline-block w-full p-3 border border-indigo-600 rounded-lg px-4 md:px-5 xl:px-4 py-3 md:py-4 xl:py-3 bg-indigo-500 hover:bg-indigo-600 md:text-lg xl:text-base text-white hover:text-white font-semibold leading-tight shadow-md" href="#">Get started</a>
                </div>
            </div>

            <div class="mb-4 lg:mb-0 lg:w-1/3 lg:px-2">
                <div class="text-center border bg-white p-10 rounded-lg hover:shadow-xl">
                    <h2 class="text-lg mb-4">Pro</h2>
                    <div class="mb-6">
                        <span class="block text-5xl pb-2">$20</span>
                        <span class="text-sm text-grey">Monthly</span>
                    </div>
                    <div class="border-t border-solid text-sm pb-10">
                        <div class="text-center border-b py-4">
                            Website Tests
                        </div>
                        <div class="text-center border-b py-4">
                            API Tests
                        </div>
                        <div class="text-center border-b py-4">
                            Support
                        </div>
                    </div>
                    <a class="inline-block w-full p-3 border border-indigo-500 rounded-lg px-4 md:px-5 xl:px-4 py-3 md:py-4 xl:py-3 bg-white hover:bg-indigo-500 md:text-lg xl:text-base text-indigo-500 hover:text-white font-semibold leading-tight shadow-md" href="#">Get started</a>
                </div>
            </div>

        </div>
    </div>

    <div class="flex flex-col break-words bg-white border border-1 rounded shadow-md m-10"></div>

@endsection
