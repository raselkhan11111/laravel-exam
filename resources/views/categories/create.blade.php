<x-master>
    <x-slot:title>
        Category Create
        </x-slot>

        @if(session('message'))
        <span class="text-success">{{ session('message') }}</span>
        @endif

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('categories.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">
                        <span data-feather="list"></span>
                        List
                    </button>
                </a>
            </div>
        </div>

        <x-forms.errors />

        <form 
            action="{{ route('categories.store') }}" 
            method="post" 
            enctype="multipart/form-data">

            @csrf

            <x-forms.input 
                type="text" 
                name="title" 
                placeholder="Enter title" 
                required
                label="Title"
                />

            <x-forms.input type="file" name="image" label='Picture' />

            @php
                $checklist = ['Is Active'];
            @endphp


            <x-forms.checkboxcc name="is_active" :checklist="$checklist" />

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</x-master>