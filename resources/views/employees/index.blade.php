<x-app-layout>
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('agents autorité') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('employees.create') }}">
                <button class="add-btn" style="vertical-align:middle"><span>Ajouter un nouvel agent d'autorité</span></button>
            </a>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-container">
                    <div class="search-bar">
                        <input type="text" id="searchEmployeeInput" placeholder="Rechercher des Agents..." onkeyup="filterEmployees()">
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>La zone assignée</th>
                                <th>CIN</th>
                                <th>Téléphone</th>
                                <th>Annex</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="employeesTable" style="display:none;">
                            @foreach ($employees as $employee)
                            <tr>
                                <td>
                                    @if ($employee->picture)
                                        <img src="{{ asset('storage/' . $employee->picture) }}" alt="Picture" class="h-12 w-12 rounded-full object-cover">
                                    @else
                                        <span>No Picture</span>
                                    @endif
                                </td>
                                <td>{{ $employee->code }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->cin }}</td>
                                <td>{{ $employee->phone_number }}</td>
                                <td>{{ optional($employee->province)->nom ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('employees.edit', $employee->id) }}">
                                        <button class="update-btn">Modifier&nbsp;&nbsp; <i class="fa-regular fa-pen-to-square"></i></button>
                                    </a>
                                    <button class="delete-btn" data-employee-id="{{ $employee->id }}">Supprimer&nbsp;&nbsp;<i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<link rel="stylesheet" href="{{ asset('assets/style/table.css') }}">
<script src="{{ asset('js/employees.js') }}"></script>





<!-- JavaScript for search functionality -->

<script>
    function filterEmployees() {
        const input = document.getElementById('searchEmployeeInput').value.toLowerCase();
        const rows = document.querySelectorAll('#employeesTable tr');
        let visibleRows = 0;  // Counter for visible rows

        // If the input is empty, hide all rows
        if (input === '') {
            rows.forEach(row => {
                row.style.display = 'none'; // Hide all rows
            });
            return;  // Stop further execution
        }

        // Iterate over each row and show/hide based on the search input
        rows.forEach(row => {
            const code = row.cells[0].textContent.toLowerCase();
            const firstName = row.cells[1].textContent.toLowerCase();
            const lastName = row.cells[2].textContent.toLowerCase();
            const address = row.cells[3].textContent.toLowerCase();
            const cin = row.cells[4].textContent.toLowerCase();
            const phoneNumber = row.cells[5].textContent.toLowerCase();
            const annex = row.cells[6].textContent.toLowerCase();

            // Show row if any column matches the input, otherwise hide
            if (code.includes(input) || firstName.includes(input) || lastName.includes(input) || address.includes(input) || cin.includes(input) || phoneNumber.includes(input) || annex.includes(input)) {
                row.style.display = '';  // Show row
                visibleRows++;  // Increment visible row count
            } else {
                row.style.display = 'none';  // Hide row
            }
        });

        // If no rows are visible, hide the table
        const employeesTable = document.getElementById('employeesTable');
        if (visibleRows > 0) {
            employeesTable.style.display = '';  // Show table if rows are visible
        } else {
            employeesTable.style.display = 'none';  // Hide table if no rows are visible
        }
    }
</script>

