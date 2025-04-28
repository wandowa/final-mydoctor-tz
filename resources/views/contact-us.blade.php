@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
   
    <!-- Contact Section -->
    <section class="py-12 mt-10 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Contact Form -->
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:shadow-xl">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Send Us a Message</h2>
                    @if (session('contact_success'))
                        <div class="text-green-600 mb-6">{{ session('contact_success') }}</div>
                    @endif
                    @if (session('contact_error'))
                        <div class="text-red-600 mb-6">{{ session('contact_error') }}</div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Full Name -->
                        <div class="relative">
                            <label for="full-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full Name</label>
                            <div class="mt-1 flex items-center">
                                <svg class="w-5 h-5 text-green-800 absolute left-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                <input type="text" id="full-name" name="full-name" class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:text-white" placeholder="John Doe" required>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="relative">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <div class="mt-1 flex items-center">
                                <svg class="w-5 h-5 text-green-800 absolute left-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                                <input type="email" id="email" name="email" class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:text-white" placeholder="you@example.com" required>
                            </div>
                        </div>
                        <!-- Subject -->
                        <div class="relative">
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                            <div class="mt-1 flex items-center">
                                <svg class="w-5 h-5 text-green-800 absolute left-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                                <input type="text" id="subject" name="subject" class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:text-white" placeholder="Your Subject" required>
                            </div>
                        </div>
                        <!-- Message -->
                        <div class="relative">
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                            <div class="mt-1 flex items-start">
                                <svg class="w-5 h-5 text-green-800 absolute left-3 top-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd" />
                                </svg>
                                <textarea id="message" name="message" rows="4" class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:text-white" placeholder="Your Message" required></textarea>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full px-6 py-3 bg-green-400 text-black rounded-full font-semibold hover:bg-blue-400 transition duration-300 shadow-md">Send Message</button>
                        </div>
                    </form>
                </div>

                <!-- Contact Info and Map -->
                <div>
                    <!-- Contact Details -->
                    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 mb-6 transform transition-all duration-300 hover:shadow-xl">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Get in Touch</h2>
                        <ul class="space-y-4 text-gray-600 dark:text-gray-300">
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-green-800 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 2a8 8 0 00-8 8c0 1.306.317 2.536.875 3.618l-.718 2.515a1 1 0 001.225 1.225l2.515-.718A7.973 7.973 0 0010 18a8 8 0 000-16zm-3 8a1 1 0 112 0 1 1 0 01-2 0zm3 0a1 1 0 112 0 1 1 0 01-2 0zm3 0a1 1 0 112 0 1 1 0 01-2 0z" clip-rule="evenodd" />
                                </svg>
                                <span>+255 759 042 291</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-green-800 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 3a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H3a1 1 0 01-1-1V3zm2 2v10h12V5H4z" />
                                </svg>
                                <span>mydoctor.tz@gmail.com</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-green-800 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                <span>Dar es Salaam, Tanzania</span>
                            </li>
                        </ul>
                    </div>
                    <!-- Google Map -->
                    <div class="rounded-xl shadow-lg overflow-hidden">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798999855661!2d39.27517671427047!3d-6.814391695070606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNDgnNTEuOCJTIDM5wrAxNic0NS4wIkU!5e0!3m2!1sen!2sus!4v1634567890123" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-8 text-black">
        <div class="container mx-auto px-2">
            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold">Subscribe to Our Newsletter</h2>
                <p class="mt-3 text-base md:text-lg max-w-xl mx-auto">
                    Stay updated with the latest news, offers, and insights. Join our community today!
                </p>
            </div>
    
            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="text-center text-green-800 mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="text-center text-red-600 mb-4">
                    {{ session('error') }}
                </div>
            @endif
    
            <!-- Subscription Form -->
            <div class="flex justify-center">
                <form action="{{ route('subscribe') }}" method="POST" class="w-full max-w-lg flex flex-col sm:flex-row gap-4">
                    @csrf
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="Enter your email address" 
                        class="flex-1 px-4 py-3 rounded-md bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-800 transition duration-300" 
                        required
                    >
                    <button 
                        type="submit" 
                        class="px-6 py-3 bg-green-400 text-black font-semibold rounded-md hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-gray-700 transition duration-300"
                    >Subscribe
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection