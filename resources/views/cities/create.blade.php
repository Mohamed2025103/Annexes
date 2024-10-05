<!-- resources/views/create-city.blade.php -->
<link rel="stylesheet" href="{{ asset('assets/style/table.css') }}">
<script src="{{ asset('js/regions.js') }}"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New City') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('cities.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="city_name" class="block text-sm font-medium text-gray-700">City Name</label>
                            <input type="text" name="city_name" id="city_name" class="mt-1 block w-full" required>
                        </div>

                        {{-- <div class="mb-4">
                            <label for="region_id" class="block text-sm font-medium text-gray-700">Region</label>
                            <select name="region_id" id="region_id" class="mt-1 block w-full" required>
                                <option value="">Select a region</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                                Add City
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
