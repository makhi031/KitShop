@extends('layouts.app')

@section('content')
    <main class="flex-1 w-full bg-white">
        <section class="max-w-xl mx-auto py-16 px-4 md:px-8">
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-blue-900 mb-4">Contact KitShop</h1>
                <p class="text-lg text-gray-700">Have a question, need help, or want to share your Gunpla journey? Reach out to us!</p>
            </div>
            <div class="bg-blue-50 rounded-lg p-8 mb-8">
                <form class="flex flex-col gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-blue-900 mb-1">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded border border-gray-200 focus:ring-2 focus:ring-blue-300 focus:outline-none text-base" placeholder="Your Name" required />
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-blue-900 mb-1">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded border border-gray-200 focus:ring-2 focus:ring-blue-300 focus:outline-none text-base" placeholder="you@email.com" required />
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-blue-900 mb-1">Message</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 rounded border border-gray-200 focus:ring-2 focus:ring-blue-300 focus:outline-none text-base" placeholder="How can we help you?" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold text-lg">Send Message</button>
                </form>
            </div>
            <div class="text-center">
                <div class="inline-flex items-center gap-2 text-blue-900 font-semibold text-lg">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5.75C3 4.784 3.784 4 4.75 4h14.5A1.75 1.75 0 0 1 21 5.75v12.5A1.75 1.75 0 0 1 19.25 20H4.75A1.75 1.75 0 0 1 3 18.25V5.75Zm0 0L12 13l9-7.25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span>support@kitshop.com</span>
                </div>
                <div class="mt-4 inline-flex items-center gap-2 text-blue-900 font-semibold text-lg">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 6.5A3.5 3.5 0 0 1 5.5 3h13A3.5 3.5 0 0 1 22 6.5v11A3.5 3.5 0 0 1 18.5 21h-13A3.5 3.5 0 0 1 2 17.5v-11Z" stroke="currentColor" stroke-width="2"/><path d="M6 8h12M6 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    <span>+1 (555) 123-4567</span>
                </div>
            </div>
        </section>
    </main>
@endsection
