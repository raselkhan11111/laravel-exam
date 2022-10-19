<x-master>
    <x-slot:title>
        students Details
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">students Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
            </div>
            <a href="{{ route('students.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <h1>Name: {{ $student->name }}</h1>
    <h1>Birthday: {{ $student->date_of_birth }}</h1>
    <h1>Gender: {{ $student->gender }}</h1>
    <h1>
        <p>Hobbies: @if ($student->hobbies1==true){{ $student->hobbies1 ? 'Reading books' : 'No' }} @endif
            @if ($student->hobbies2==true){{ $student->hobbies2 ? 'games' : 'No' }} @endif
            <br>
            @if ($student->hobbies3==true){{ $student->hobbies3 ? 'Singing' : 'No' }} @endif
        </p>
    </h1>

    <h1>
        <p>Nationality: {{ $student->nationality }}
        </p>
    </h1>

</x-master>