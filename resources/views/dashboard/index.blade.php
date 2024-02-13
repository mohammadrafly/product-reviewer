@extends('layout.app')

@section('content')

<h1 class="text-3xl font-extralight">Welcome Back! , <span class="font-semibold">{{ Auth::user()->name }}</span></h1>
<div class="flex flex-wrap pt-5">
    <a href="#" class="justify-self-stretch relative block min-w-[450px] p-6 mb-4 mr-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="flex justify-between">
            <div>
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Total Users</h5>
                <p class="font-bold text-gray-700 text-3xl">{{ $user }}</p>
            </div>
            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
            </svg>
        </div>
    </a>    
    <a href="#" class="justify-self-stretch relative block min-w-[450px] p-6 mb-4 mr-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="flex justify-between">
            <div>
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Total Karyawan</h5>
                <p class="font-bold text-gray-700 text-3xl">{{ $product }}</p>
            </div>
            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9V4a3 3 0 0 0-6 0v5m9.92 10H2.08a1 1 0 0 1-1-1.077L2 6h14l.917 11.923A1 1 0 0 1 15.92 19Z"/>
            </svg>
        </div>
    </a>    
    <a href="#" class="justify-self-stretch relative block min-w-[450px] p-6 mb-4 mr-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="flex justify-between">
            <div>
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Total Review</h5>
                <p class="font-bold text-gray-700 text-3xl">{{ $review }}</p>
            </div>
            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h9M5 9h5m8-8H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h4l3.5 4 3.5-4h5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
            </svg>
        </div>
    </a>    
</div>

@endsection
