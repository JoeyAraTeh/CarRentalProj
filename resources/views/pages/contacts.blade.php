@extends('layouts.app')

@section('content')
<div class="container mx-auto py-16 px-6 flex flex-col md:flex-row items-start justify-center min-h-screen bg-gradient-to-br from-gray-50 to-gray-200 gap-12">
    <!-- Company Info -->
    <div class="max-w-md w-full bg-white shadow-xl rounded-2xl p-10 border border-gray-200 self-start">
        <h2 class="text-2xl font-semibold text-[#3D53CF]">Company Information</h2>
        <p class="text-gray-600 mt-3">Feel free to reach out or visit us at our office.</p>
        <div class="mt-6 space-y-4">
            <p class="text-gray-700"><strong>Phone:</strong> +63 912 345 2342</p>
            <p class="text-gray-700"><strong>Email:</strong> cleaningcompany@gmail.com</p>
            <p class="text-gray-700"><strong>Address:</strong> Sta. Ana Ave, Davao, Philippines</p>
            <p class="text-gray-700"><strong>Business Hours:</strong> Mon-Fri: 9AM - 6PM</p>
        </div>
    </div>
    
    <!-- Contact Form -->
    <div class="max-w-3xl w-full bg-white shadow-xl rounded-2xl p-10 border border-gray-200">
        <h1 class="text-4xl font-extrabold text-[#3D53CF] text-center">Contact Us</h1>
        <p class="text-gray-500 text-center mt-3">We'd love to hear from you. Reach out with any questions or inquiries.</p>
        
        <form class="mt-8 space-y-6">
            <div class="relative">
                <label class="block text-gray-700 font-medium">Name</label>
                <input type="text" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3D53CF] transition" placeholder="Enter your name">
            </div>
            <div class="relative">
                <label class="block text-gray-700 font-medium">Email</label>
                <input type="email" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3D53CF] transition" placeholder="Enter your email">
            </div>
            <div class="relative">
                <label class="block text-gray-700 font-medium">Message</label>
                <textarea class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3D53CF] transition" rows="5" placeholder="Write your message here..."></textarea>
            </div>
            <button class="w-full bg-[#3D53CF] text-white py-3 rounded-lg font-semibold hover:bg-[#2B3AA6] transition-all duration-300 transform hover:scale-105">Send Message</button>
        </form>
    </div>
</div>

@endsection
