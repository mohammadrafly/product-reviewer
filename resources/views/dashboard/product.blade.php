@extends('layout.app')

@section('content')

<h1 class="text-3xl font-extralight">{{ $title }}</h1>

<button class="bg-blue-500 text-white px-4 py-2 my-4 rounded" onclick="toggleCollapse('form')">
    Add {{ $title }}
</button>

<div id="form" class="hidden overflow-hidden transition-transform ease-in-out duration-300 max-h-0 bg-white p-5 rounded-lg">
    <form id="productForm" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
            <input type="text" class="w-full border p-2 rounded" name="product_name" id="product_name" placeholder="Enter product name" required>
            <input type="number" id="id" name="id" hidden>
        </div>
        <div class="mb-4">
            <label for="product_desc" class="block text-gray-700 text-sm font-bold mb-2">Product Description</label>
            <textarea class="w-full border p-2 rounded" name="product_desc" id="product_desc" placeholder="Enter product description" required></textarea>
        </div>
        <div class="mb-4">
            <label for="published" class="block text-gray-700 text-sm font-bold mb-2">Published</label>
            <select class="w-full border p-2 rounded" name="published" id="published">
                <option selected>Pilih Status</option>
                <option value="true">True</option>
                <option value="false">False</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" name="product_picture" id="product_picture" type="file" required>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
        </div>
        <div id="file_name_display"></div>
        <button type="button" onclick="saveProduct()" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>    
</div>

<div class="w-full h-screen bg-white p-5 mt-5 rounded-md">
    <div class="relative overflow-x-auto rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-gray-500">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product desc
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product picture
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Published
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $row->product_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $row->product_desc }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->product_picture }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->published }}
                    </td>
                    <td class="px-6 py-4">
                        <button class="bg-yellow-500 text-white px-4 py-2 rounded" onclick="updateProduct('{{ $row->id }}')">Edit</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteProduct('{{ $row->id }}')">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('assets/js/Product.js') }}"></script>

@endsection
