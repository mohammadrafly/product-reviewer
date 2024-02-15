@extends('layout.app')

@section('content')

<h1 class="text-3xl font-extralight">{{ $title }}</h1>

<button class="bg-blue-500 text-white px-4 py-2 my-4 rounded" onclick="toggleCollapse('form')">
    Add {{ $title }}
</button>

<div id="form" class="hidden overflow-hidden transition-transform ease-in-out duration-300 max-h-0 bg-white p-5 rounded-lg">
    <form id="reviewForm" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="product" class="block text-gray-700 text-sm font-bold mb-2">Product</label>
            <select class="w-full border p-2 rounded" name="id_product" id="id_product">
                <option selected>Pilih Product</option>
                @foreach($data['dataProduct'] as $dt)
                <option value="{{ $dt->id }}">{{ $dt->product_name }}</option>
                @endforeach
            </select>
            <input type="number" id="id" name="id" hidden>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" class="w-full border p-2 rounded" name="name" id="name" placeholder="Enter nama" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" class="w-full border p-2 rounded" name="email" id="email" placeholder="Enter email" required>
        </div>
        <div class="mb-4">
            <label for="stars" class="block text-gray-700 text-sm font-bold mb-2">Stars</label>
            <input type="number" class="w-full border p-2 rounded" name="stars" id="stars" placeholder="Enter stars" required>
        </div>
        <div class="mb-4">
            <label for="review" class="block text-gray-700 text-sm font-bold mb-2">Review</label>
            <textarea type="text" class="w-full border p-2 rounded" name="review" id="review" required></textarea>
        </div>
        <button type="button" onclick="saveReview()" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>    
</div>

<div class="w-full h-screen bg-white p-5 mt-5 rounded-md">
    <div class="relative overflow-x-auto rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-gray-500">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id Product
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stars
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Review
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data['dataReview'] as $row)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $row->id_product }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $row->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->stars }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->review }}
                    </td>
                    <td class="px-6 py-4">
                        <button class="bg-yellow-500 text-white px-4 py-2 rounded" onclick="updateReview('{{ $row->id }}')">Edit</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteReview('{{ $row->id }}')">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('assets/js/Review.js') }}"></script>

@endsection
