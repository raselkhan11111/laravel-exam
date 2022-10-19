<x-master>
    <x-slot:title>
        Product List
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Products</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{route('Products.pdf')}}">

                        <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
                    </a>

                    <a href="{{route('Products.export')}}">

                        <button type="button" class="btn btn-sm btn-outline-secondary">Export Excel</button>
                    </a>

                </div>

                <a href="{{route('Products.trash')}}"> <button type="button" class="btn btn-sm btn-outline-danger">
                        <span data-feather="plus"></span>
                        Trash
                    </button> </a>
                <a href="{{route('Products.create')}}"> <button type="button" class="btn btn-sm btn-outline-primary">
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
                    <th>Title</th>
                    <th>Category Id</th>
                    <th>Category Name </th>
                    <th>Product Price</th>
                    <th>Active Status</th>
                    <th>Description</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


                @foreach($Products as $Product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $Product->title }}</td>
                    <td>{{ $Product->category_id }}</td>
                    <td>
                    {{$Product->category->title}}
                    </td>
                    <td>{{ $Product->price }}</td>
                    <td>{{ $Product->is_active? 'Yes' : 'No' }}

                    </td>
                    <td>{{ $Product->description}}</td>


                    <td>
                        <a class="btn btn-sm btn-outline-info" href="{{ route('Products.show', $Product->id) }}">Show</a>

                        <a class="btn btn-sm btn-outline-info" href="{{ route('Products.edit', $Product->id) }}">| Edit |</a>
                        <form action="{{ route('Products.destroy', $Product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger">Delete </button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $Products->links() }}
</x-master>