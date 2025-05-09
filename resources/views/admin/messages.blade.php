@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-16 px-6">
        <h1 class="text-2xl font-semibold text-[#333333] mb-6">Messages from Clients</h1>

        <!-- Display the messages in a responsive flex layout -->
        <div class="flex flex-wrap gap-6">
            <!-- Loop through the messages passed to the view -->
            @foreach($messages as $message)
                <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 2xl:w-1/5 p-4">
                    <div class="bg-white p-6 shadow-xl rounded-lg border-t-4 border-[#706C61] hover:shadow-2xl transition-all duration-300">
                        <div class="flex flex-col space-y-4">
                            <div>
                                <p class="text-lg font-semibold text-[#333333]">{{ $message->name }}</p>
                                <p class="text-sm text-[#706C61]">{{ $message->email }}</p>
                            </div>
                            <div class="text-sm text-[#333333]">
                                <p>{{ $message->message }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
