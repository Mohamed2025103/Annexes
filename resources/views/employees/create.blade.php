<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name:</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="id_number" class="block text-sm font-medium text-gray-700">ID Number:</label>
                            <input type="number" name="id_number" id="id_number" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number:</label>
                            <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="Employee_Area" class="block text-sm font-medium text-gray-700">Employee Area:</label>
                            <input type="text" name="Employee_Area" id="Employee_Area" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="city_id" class="block text-sm font-medium text-gray-700">City:</label>
                            <select name="city_id" id="city_id" class="mt-1 block w-full" required>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="province_id" class="block text-sm font-medium text-gray-700">Province:</label>
                            <select name="province_id" id="province_id" class="mt-1 block w-full" required>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                            Add Employee
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
