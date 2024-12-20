<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter nouvel agent') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Code Field -->
                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700">Code:</label>
                            <input type="text" name="code" id="code" class="mt-1 block w-full" required>
                        </div>

                        <!-- Nom Field -->
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Nom:</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 block w-full" required>
                        </div>

                        <!-- Prénom Field -->
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Prénom:</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 block w-full" required>
                        </div>

                        <!-- Address Field (replaced Employee_Area) -->
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">La zone assignée:</label>
                            <input type="text" name="address" id="address" class="mt-1 block w-full" required>
                        </div>

                        <!-- CIN Field -->
                        <div class="mb-4">
                            <label for="cin" class="block text-sm font-medium text-gray-700">CIN:</label>
                            <input type="text" name="cin" id="cin" class="mt-1 block w-full" required>
                        </div>

                        <!-- Télephone Field -->
                        <div class="mb-4">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Télephone:</label>
                            <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full" required>
                        </div>

                        <!-- Annex/Province Field -->
                        <div class="mb-4">
                            <label for="province_id" class="block text-sm font-medium text-gray-700">Annex:</label>
                            <select name="province_id" id="province_id" class="mt-1 block w-full" required>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="picture" class="block text-sm font-medium text-gray-700">Picture:</label>
                            <input type="file" name="picture" id="picture" class="mt-1 block w-full" accept="image/*">
                        </div>


                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
