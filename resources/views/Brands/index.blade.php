<x-master>
    <x-slot:title>
        brands List
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Brands</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{route('Brands.pdf')}}">

                        <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
                    </a>

                    <a href="{{route('Brands.export')}}">

                        <button type="button" class="btn btn-sm btn-outline-secondary">Export Excel</button>
                    </a>

                </div>

                <a href="{{route('Brands.trash')}}"> <button type="button" class="btn btn-sm btn-outline-danger">
                        <span data-feather="plus"></span>
                        Trash
                    </button> </a>
                <a href="{{route('Brands.create')}}"> <button type="button" class="btn btn-sm btn-outline-primary">
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
                    <th>Band Name</th>
                    <th>Color Id</th>
                    <th>Color Name </th>

                    <th>Active Status</th>
                    <th>Description</th>

                    <th>Action</th>
                </tr>
            </thead>

            @foreach( $brands as $brand)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->color_id }}</td>
                <td>
                    {{$brand->color->name}}
                </td>

                <td>{{ $brand->is_active? 'Yes' : 'No' }}

                </td>
                <td>{{ $brand->description}}</td>


                <td>
                    <a class="btn btn-sm btn-outline-info" href="{{ route('Brands.show', $brand->id) }}">Show</a>

                    <a class="btn btn-sm btn-outline-info" href="{{ route('Brands.edit', $brand->id) }}">| Edit |</a>
                    <form action="{{ route('Brands.destroy', $brand->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-outline-danger">Delete </button>
                    </form>


                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $brands->links() }}

</x-master>