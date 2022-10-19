<x-master>
    <x-slot:name>
        Brand Create
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Brand</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export Excel</button>
                </div>

                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="plus"></span>
                    Add New
                </button>
            </div>
        </div>

        @if(session('message'))
        <p class="text-success">
            {{ session('message') }}
        </p>
        @endif


        <form action="{{route('Brands.store')}}" method="post" enctype="multipart/form-data">

            @csrf

            <x-forms.input type="text" name="name" label="Name" class="bg-info" value="{{old('name')}}" required placeholder="Enter name" />



            <x-forms.select name="color_id" label="Select category" :values="$colors" />





            <x-forms.textarea name="description" label="Product Description" class="summernote" value="{{old('description')}}" required placeholder="Type Description" />



            @php
            $checklist = ['Is Active'];
            @endphp


            <x-forms.checkboxcc name="is_active" :checklist="$checklist" />
            <x-forms.input type="file" name="image" label="Picture" />


            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-dark mx-2">Cancle</button>
        </form>






</x-master>