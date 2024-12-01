<link rel="stylesheet" href="{{ asset('assets/style/table.css') }}">
<script src="{{ asset('js/regions.js') }}"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ajouter nouvel Annex') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('provinces.store') }}" method="POST">
                        @csrf

                        <!-- Code -->
                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700">Code:</label>
                            <input type="text" name="code" id="code" class="mt-1 block w-full" required>
                        </div>

                        <!-- Nom (Name) -->
                        <div class="mb-4">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom:</label>
                            <input type="text" name="nom" id="nom" class="mt-1 block w-full" required>
                        </div>

                        <!-- Adresse -->
                        <div class="mb-4">
                            <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse:</label>
                            <input type="text" name="adresse" id="adresse" class="mt-1 block w-full" required>
                        </div>

                        <!-- Adresse Tél (Phone Number) -->
                        <div class="mb-4">
                            <label for="adresse_tel" class="block text-sm font-medium text-gray-700">Télephone:</label>
                            <input type="text" name="adresse_tel" id="adresse_tel" class="mt-1 block w-full" required>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                            {{ __('Ajouter') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
