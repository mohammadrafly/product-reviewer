@extends('layout.app')

@section('content')

<h1 class="text-3xl font-extralight">{{ $title }}</h1>

<div class="w-full h-screen bg-white p-5 mt-5 rounded-md">
    <div class="relative overflow-x-auto rounded-md">
        <table id="table" class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-gray-500">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contact Person
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Position
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fax No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judgement
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $row)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $index + 1 }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $row->company_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $row->contact_person }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->position }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->address }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->phone_no }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->fax_no }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->judgement }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->created_at }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')

<script>
    $(document).ready( function () {
        $('#table').DataTable();
    });
</script>

@endsection
