@extends('layouts.main')

@section('content')
<div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
    <div class="bg-pink-100 py-2 px-4">
        <h2 class="text-xl font-semibold text-gray-800">Event</h2>
         </div>
            <ul class="divide-y divide-gray-200">
                @foreach ($records as $record)
                <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                    <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                    <div class="flex-1">
                        <a href="{{ route('events.show', ['event' => App\Models\Event::find($record->event_id)]) }}">{{(App\Models\Event::find($record->event_id))->name}}</a>

                        <img src="{{(App\Models\Event::find($record->event_id))->poster}}" alt="">
                        <h3 class="text-lg font-medium text-gray-800">user_id : {{ $record->user_id }}</h3>
                        </a>
                        <p class="text-gray-600 text-base"></p>
                    </div>
                    <span class="text-gray-400"></span>
                </li>
                @endforeach
            </ul>
    </div>
@endsection