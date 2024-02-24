@extends('layout.landing')

@section('content')

  <div class="w-full">
    <div class="bg-white rounded-lg">
      <div class="pt-6">
    
        <div class="px-4 sm:px-0">
          <div class="relative h-[500px] overflow-hidden rounded-lg bg-gray-600">
            <img src="{{ asset('product_pictures/'. $data['product']->product_picture )}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
          </div>
        </div>

        <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
          <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $data['product']->product_name}}</h1>
          </div>
    
          <div class="mt-4 lg:row-span-3 lg:mt-0">
            <h2 class="sr-only">Product information</h2>
            <div class="mt-6">
              <h3 class="sr-only">Reviews</h3>
              <div class="flex items-center">
                <div class="flex items-center">
                  @php
                      $productReview = $data['review']->avg('stars');
                      $formattedReview = number_format($productReview, 1);
                  @endphp
                  @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $productReview)
                          <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                          </svg>
                      @else
                          <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                              <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                          </svg>
                      @endif
                  @endfor
                </div>
                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $formattedReview }}</p>
                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of 5</p>
                <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{ $data['countReview']}} reviews</a>
              </div>
            </div>
            <button onclick="toggleCollapse('form')" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Review</button>
            <div id="form" class="hidden overflow-hidden transition-transform ease-in-out duration-300 max-h-0 bg-white p-5 rounded-lg">
              <form id="reviewForm" class="mt-4">
                  @csrf
                  <div class="mb-4">
                      <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                      <input type="text" class="w-full border p-2 rounded" name="name" id="name" placeholder="Enter nama" required>
                      <input type="id" value="{{ $data['product']->id }}" id="id_product" hidden>
                  </div>
                  <div class="mb-4">
                      <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                      <input type="email" class="w-full border p-2 rounded" name="email" id="email" placeholder="Enter email" required>
                  </div>
                  <div class="mb-4">
                      <label for="stars" class="block text-gray-700 text-sm font-bold mb-2">Stars</label>
                      <input type="number" class="w-full border p-2 rounded" name="stars" id="stars" placeholder="Enter stars" required min="1" max="5">
                  </div>
                  <div class="mb-4">
                      <label for="review" class="block text-gray-700 text-sm font-bold mb-2">Review</label>
                      <textarea type="text" class="w-full border p-2 rounded" name="review" id="review" required></textarea>
                  </div>
                  <button type="button" onclick="saveReview()" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
              </form>    
            </div>
          </div>
    
          <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
            <div>
              <h3 class="sr-only">Description</h3>
              <div class="space-y-6">
                <p class="text-base text-gray-900">{{ $data['product']->product_desc}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <h1 class="text-2xl font-semibold mt-5 mb-5">Reviews</h1>
    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($data['review'] as $item)
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
              <svg class="w-12 h-12 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M12 20a8 8 0 0 1-5-1.8v-.6c0-1.8 1.5-3.3 3.3-3.3h3.4c1.8 0 3.3 1.5 3.3 3.3v.6a8 8 0 0 1-5 1.8ZM2 12a10 10 0 1 1 10 10A10 10 0 0 1 2 12Zm10-5a3.3 3.3 0 0 0-3.3 3.3c0 1.7 1.5 3.2 3.3 3.2 1.8 0 3.3-1.5 3.3-3.3C15.3 8.6 13.8 7 12 7Z" clip-rule="evenodd"/>
              </svg>
              <div class="min-w-0 flex-auto">
                <p class="text-sm font-semibold leading-6 text-gray-900">{{$item->name}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$item->email}}</p>
              </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
              <div class="flex items-center">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $item->stars)
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                        </svg>
                    @else
                        <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                    @endif
                @endfor
                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $item->stars }}</p>
                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of 5</p>
                </div>
              <p class="mt-1 text-xs leading-5 text-gray-500">{{Str::limit($item->review, $limit = 100, $end = '...') }}</p>
            </div>
        </li>
        @endforeach
    </ul>
  </div>

@endsection

@section('script')

<script>
    document.getElementById('stars').addEventListener('input', function() {
        var starsInput = document.getElementById('stars');
        var starsValue = parseInt(starsInput.value);
        if (starsValue > 5) {
            starsInput.value = 5;
        }
    });

    function saveReview() {
        const id = $('#id_product').val();
        var formData = new FormData($('#reviewForm')[0]);

        ajaxRequest(`product/review/${id}`, 'POST', formData,
            function(response) {
                console.log(response);
                $('#reviewForm')[0].reset();
                alert('Review saved successfully!');
            },
            function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Failed to save review. Please try again later.');
            }
        );
    }
</script>
@endsection