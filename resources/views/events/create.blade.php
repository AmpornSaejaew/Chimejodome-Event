@extends('layouts.main')

@section('content')

<div class="w-full">
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
            <h4 class="text-black font-bold text-2xl uppercase mb-4">Create New Event</h4>
            <hr class="border-gray border-3 mb-8 px-[9rem] rounded-xl ">
            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div>
                    <span class="flex space-x-8 mb-8">
                        <label for="name" class="block mb-4 mt-6 font-bold text-gray-600">Event Name</label>
                        <input type="text" class="py-8 px-5 mt-6 rounded-full bg-[#D9D9D9] text-black flex-1 h-7" id="name" name="name" autocomplete="off" placeholder="Put in event name" >
                    </span>
                    
                    <div class="flex justify-center space-x-8">
                        <button type="submit" class="flex-1 block bg-blue-500 mt-8 text-white font-bold p-2 rounded-full">Submit</button>
                        <button type="submit" class="flex-1 block bg-red-500 mt-8 text-white font-bold p-2 rounded-full">Cancel</button>
                    </div>  
                </div>
            </form>
</div>

@endsection