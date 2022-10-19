<x-master>
    <x-slot:title>
        Course List
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Courses</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{route('Courses.pdf')}}">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
                    </a>
                    <a href="{{route('Courses.export')}}">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export Excel</button>
                    </a>
                    
                    <a href="{{route('Courses.trash')}}">
                        <button type="button" class="btn btn-sm btn-outline-danger">Trash</button>

                    </a>
                </div>


                <a href="{{route('Courses.create')}}"> <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        Add New
                    </button> </a>

            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Technology </th>
                    <th>Duration</th>
                    <th>Start Date</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Courses as $Course)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $Course->title }}</td>
                    <td>{{ $Course->category }}</td>
                    <td>{{ $Course->type }}</td>
                    <td> @php $techs =json_decode($Course->technology)

                        @endphp
                        @foreach($techs as $tech)
                        {{$tech}},

                        @endforeach

                    </td>
                    <td>{{ $Course->duration}}</td>
                    <td>{{ $Course->startdate}}</td>
                    <td><img src="{{asset('storage/courses/'
        .$Course->image)}}" height="50" alt="no image"></td>
                    <td>
                        <a class="btn btn-sm btn-outline-info" href="{{ route('Courses.show', $Course->id) }}">Show</a>

                        <a class="btn btn-sm btn-outline-info" href="{{ route('Courses.edit', $Course->id) }}">| Edit |</a>
                        <form action="{{ route('Courses.destroy', $Course->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger" 
                            onclick="return confirm('Are you sure want to delete')"
                            >Delete </button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-master>