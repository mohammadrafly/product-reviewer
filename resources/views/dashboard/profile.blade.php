@extends('layout.app')

@section('content')

<h1 class="text-3xl font-extralight">{{ $title }}</h1>

<div class="w-full bg-white p-5 mt-5 rounded-md">
    <div class="relative overflow-x-auto rounded-md">
        <form id="profileForm" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input type="text" class="w-full border p-2 rounded" name="name" id="name" value="{{ $data['userdata']->name }}" placeholder="Enter nama" required>
                <input type="number" id="id" name="id" value="{{ $data['userdata']->id }}" hidden>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" class="w-full border p-2 rounded" name="email" id="email" value="{{ $data['userdata']->email }}" placeholder="Enter email" required>
            </div>

            <button type="button" onclick="saveProfile()" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
        </form>    
    </div>
</div>

<h1 class="text-3xl font-extralight mt-5">Change Password</h1>

<div class="w-full bg-white p-5 mt-5 rounded-md">
    <div class="relative overflow-x-auto rounded-md">
        <form id="passwordForm" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="old_password" class="block text-gray-700 text-sm font-bold mb-2">Password Lama</label>
                <input type="password" class="w-full border p-2 rounded" name="old_password" id="old_password" placeholder="Masukkan Password Lama" required>
            </div>
            <div class="mb-4">
                <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2">Password Baru</label>
                <input type="password" class="w-full border p-2 rounded" name="new_password" id="new_password" placeholder="Masukkan Password Baru" required>
            </div>
            <div class="mb-4">
                <label for="new_password_confirm" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password Baru</label>
                <input type="password" class="w-full border p-2 rounded" name="new_password_confirm" id="new_password_confirm" placeholder="Masukkan Konfirmasi Password Baru" required>
            </div>
            <button type="button" onclick="savePassword()" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
        </form>    
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('assets/js/Profile.js') }}"></script>

@endsection