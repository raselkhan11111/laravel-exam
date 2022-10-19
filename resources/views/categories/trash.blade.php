<x-master>
    <x-slot:title>
        Category List
        </x-slot>

        <x-forms.message />

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories Trash</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">PDF</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Excel</button>
                    <a href="{{ route('categories.index') }}">
                        <button type="button" class="btn btn-sm btn-outline-info">List</button>
                    </a>
                </div>
                <a href="{{ route('categories.create') }}">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        Add New
                    </button>
                </a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('categories.show', $category->id) }}">Show</a>
                        <a class="btn btn-sm btn-warning" href="{{ route('categories.restore', $category->id) }}">Restore</a>
                        <form action="{{ route('categories.delete', $category->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete')" title="Permanent Delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-master>