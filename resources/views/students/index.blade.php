<x-master>
    <x-slot:title>
        Student List
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">students</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export Excel</button>
                </div>


                <a href="{{route('students.create')}}"> <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        Add New
                    </button> </a>

            </div>
        </div>

        @if(session('message'))
        <p class="text-success">
            {{ session('message') }}
        </p>
        @endif




        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Hobbies </th>
                    <th>Nationality</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>@if ($student->hobbies1==true){{ $student->hobbies1 ? 'Reading books' : 'No' }} @endif
                        <br>
                        @if ($student->hobbies2==true){{ $student->hobbies2 ? 'games' : 'No' }} @endif
                        <br>
                        @if ($student->hobbies3==true){{ $student->hobbies3 ? 'Singing' : 'No' }} @endif
                    </td>
                    <td>{{ $student->nationality }}</td>


                    <td>
                        <a class="btn btn-sm btn-outline-info" href="{{ route('students.show', $student->id) }}">Show</a>

                        <a class="btn btn-sm btn-outline-info" href="{{ route('students.edit', $student->id) }}">| Edit |</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger">Delete </button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-master>