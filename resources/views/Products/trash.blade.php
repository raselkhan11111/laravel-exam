<x-master>
    <x-slot:title>
        Product List
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Products</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export Excel</button>
                </div>
                <a href="{{route('Products.index')}}"> <button type="button" class="btn btn-sm btn-outline-info">
                        <span data-feather="plus"></span>
                        List
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
                        @foreach($Allcates as $Allca)
                        @if($Product->category_id==$Allca->id)

                        {{$Allca->title}}

                        @endif

                        @endforeach
                    </td>
                    <td>{{ $Product->price }}</td>
                    <td>{{ $Product->is_active? 'Yes' : 'No' }}

                    </td>
                    <td>{{ $Product->description}}</td>


                    <td class="d-flex">
                        <a class="btn btn-sm btn-outline-info" href="{{ route('Products.show', $Product->id) }}">Show</a>

                     {{--   <a class="btn btn-sm btn-outline-info" href="{{ route('Products.restore', $Product->id) }}">| Restore |</a>--}}
                        <form action="{{ route('Products.restore', $Product->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <button class="btn btn-sm btn-outline-warning" onclick="return confirm('Are you sure want to restore?')">Restore</button>
                        </form>

                       
                        <form action="{{ route('Products.delete', $Product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Are you sure want to delete permanetly')"
                            title="parmanet delete"
                            
                            >Delete </button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-master>