<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modification') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Code Field -->
                    <div class="mb-4">
                        <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                        <input type="text" id="code" name="code" value="{{ $employee->code }}" class="mt-1 block w-full" required>
                    </div>

                    <!-- Nom Field -->
                    <div class="mb-4">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" id="last_name" name="last_name" value="{{ $employee->last_name }}" class="mt-1 block w-full" required>
                    </div>

                    <!-- Prénom Field -->
                    <div class="mb-4">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                        <input type="text" id="first_name" name="first_name" value="{{ $employee->first_name }}" class="mt-1 block w-full" required>
                    </div>

                    <!-- Address Field (replaced Employee_Area) -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">La zone assignée</label>
                        <input type="text" id="address" name="address" value="{{ $employee->address }}" class="mt-1 block w-full" required>
                    </div>

                    <!-- CIN Field -->
                    <div class="mb-4">
                        <label for="cin" class="block text-sm font-medium text-gray-700">CIN</label>
                        <input type="text" id="cin" name="cin" value="{{ $employee->cin }}" class="mt-1 block w-full" required>
                    </div>

                    <!-- Télephone Field -->
                    <div class="mb-4">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Télephone</label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ $employee->phone_number }}" class="mt-1 block w-full" required>
                    </div>

                    <!-- Annex Field -->
                    <div class="mb-4">
                        <label for="province_id" class="block text-sm font-medium text-gray-700">Annex:</label>
                        <select name="province_id" id="province_id" class="mt-1 block w-full" required>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ $employee->province_id == $province->id ? 'selected' : '' }}>
                                    {{ $province->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- picture  --}}
                    <div class="mb-4">
                        <label for="picture" class="block text-sm font-medium text-gray-700">Picture</label>
                        <input type="file" name="picture" id="picture" class="mt-1 block w-full" accept="image/*">
                    </div>


                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
