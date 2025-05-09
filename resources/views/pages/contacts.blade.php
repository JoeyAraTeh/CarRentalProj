@extends('layouts.app')

@section('content')
<div class="mt-16">
    <div class="container mx-auto py-16 px-6 flex flex-col md:flex-row items-start justify-center min-h-screen gap-12">
        <!-- Company Info -->
        <div class="max-w-md w-full bg-white shadow-xl rounded-2xl p-10 border border-[#706C61] self-start">
            <h2 class="text-2xl font-semibold text-[#333333]">Company Information</h2>
            <p class="text-[#706C61] mt-3">Feel free to reach out or visit us at our office.</p>
            <div class="mt-6 space-y-4">
                <p class="text-[#333333]"><strong>Phone:</strong> +63 912 345 2342</p>
                <p class="text-[#333333]"><strong>Email:</strong> cleaningcompany@gmail.com</p>
                <p class="text-[#333333]"><strong>Address:</strong> Sta. Ana Ave, Davao, Philippines</p>
                <p class="text-[#333333]"><strong>Business Hours:</strong> Mon-Fri: 9AM - 6PM</p>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div class="max-w-3xl w-full bg-white shadow-xl rounded-2xl p-10 border border-[#706C61]">
            <h1 class="text-4xl font-extrabold text-[#333333] text-center">Contact Us</h1>
            <p class="text-[#706C61] text-center mt-3">We'd love to hear from you. Reach out with any questions or inquiries.</p>
            
            <form class="mt-8 space-y-6" method="POST" action="{{ route('contacts.submit') }}">
                @csrf
                <div class="relative">
                    <label class="block text-[#333333] font-medium">Name</label>
                    <input type="text" name="name" class="w-full mt-2 p-3 border border-[#706C61] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#333333] transition" placeholder="Enter your name">
                </div>
                <div class="relative">
                    <label class="block text-[#333333] font-medium">Email</label>
                    <input type="email" name="email" class="w-full mt-2 p-3 border border-[#706C61] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#333333] transition" placeholder="Enter your email">
                </div>
                <div class="relative">
                    <label class="block text-[#333333] font-medium">Message</label>
                    <textarea name="message" class="w-full mt-2 p-3 border border-[#706C61] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#333333] transition" rows="5" placeholder="Write your message here..."></textarea>
                </div>
                <button type="submit" class="w-full bg-[#706C61] text-white py-3 rounded-lg font-semibold hover:bg-[#333333] transition-all duration-300">Send Message</button>
            </form>

        </div>
    </div>
</div>
@endsection
