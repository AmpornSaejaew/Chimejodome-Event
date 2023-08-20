@extends('layouts.main')

@section('content')
<div class="px-[20rem] py-6">
    <div class="bg-white h-[36rem] px-14 py-5 rounded-3xl shadow-lg">
        <div class="font-bold text-3xl">Member</div>
        <hr class="border-1 rounded-full mt-2 border-[rgb(161,199,123)] ">
        @foreach ($users as $user)
        <li class="flex items-center py-4 px-6 hover:bg-gray-50">
            <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
            <div class="flex-1">
                <h3 class="text-md font-medium text-gray-800">{{ $user->name }}</h3>
                <p class="text-gray-600 text-base"></p>
            </div>
            <span class="text-gray-400"></span>
        </li>
        @endforeach
        <a href="{{route('events.pickOrganize',['event'=> $event])}}">เพิ่มสมาชิก</a>

    </div>
</div>
</div>
@endsection