@if ($employee->picture)
    <img src="{{ asset('storage/' . $employee->picture) }}" alt="Employee Picture" class="w-32 h-32 object-cover">
@else
    <p>No picture uploaded.</p>
@endif
