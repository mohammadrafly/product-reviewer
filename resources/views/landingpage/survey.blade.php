@extends('layout.landing')

@section('content')

<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">{{ $data['title'] }}</h2>

    @include('partials.alerts')

    <form action="{{ route('survey') }}" method="POST">
        @csrf

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-4">Company Information</h3>

            @foreach (['company_name', 'contact_person', 'position', 'address', 'phone_no', 'fax_no', 'email'] as $field)
                <div class="mb-4">
                    <label for="{{ $field }}" class="block text-gray-700 font-bold mb-2">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                    <input type="{{ $field == 'email' ? 'email' : 'text' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="{{ $field }}" name="{{ $field }}" value="{{ old($field) }}">
                </div>
            @endforeach

        </div>

        @include('landingpage.table.product-information-and-technical-requirements')

        @include('landingpage.table.communication')

        @include('landingpage.table.quotation-processing')

        @include('landingpage.table.ordering')

        @include('landingpage.table.invoicing')

        @include('landingpage.table.packaging')

        @include('landingpage.table.shipment-and-transportation')

        @include('landingpage.table.product-quality')

        @include('landingpage.table.complaint-handling')

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit
        </button>
    </form>
</div>

@endsection
