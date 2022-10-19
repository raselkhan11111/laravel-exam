<x-master>
    <x-slot:name>
        brand Edit
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">brand Edit</h1>
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






        <form action="{{route('Brands.update',$Brand->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            <x-forms.input type="text" name="name" label="Name" class="bg-info" value="{{old('name',$Brand->name)}}" required placeholder="Enter name" />


            <x-forms.select name="color_id" label="Select color" :values="$colors" :selectedval="$Brand->color_id" />





            <x-forms.textarea name="description" label="brand Description" class="bg-info" value="{{old('description',$Brand->description)}}" required placeholder="Type Description" />



            @php
            $checklist = ['Is Active'];
            if($Brand->is_active){
            $checkedItems=[0];
            }
            else {
            $checkedItems=[];
            }
            @endphp


            <x-forms.checkboxcc name="is_active" :checklist="$checklist" :checkedItems="$checkedItems" />


            <x-forms.input type="file" name="image" label="Picture" />

            <P> old Image: <img src="{{asset('storage/brands/'
        .$Brand->image)}}" height="150" alt="no image"></P>

            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-dark mx-2">Cancle</button>
        </form>






</x-master>