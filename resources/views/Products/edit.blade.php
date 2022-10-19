<x-master>
    <x-slot:title>
        Product Edit
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Product Edit</h1>
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






        <form action="{{route('Products.update',$Product->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            <x-forms.input type="text" name="title" label="Name" class="bg-info" value="{{old('title',$Product->title)}}" required placeholder="Enter name" />


            <x-forms.select name="category_id" label="Select category" :values="$categories" :selectedval="$Product->category_id" />
            <x-forms.input type="number" name="price" label="Product Price" class="bg-info" value="{{old('Price',$Product->price)}}" required placeholder="Enter name" />




            <x-forms.textarea name="description" label="Product Description" class="bg-info" value="{{old('description',$Product->description)}}" required placeholder="Type Description" />



            @php
            $checklist = ['Is Active'];
            if($Product->is_active){
                $checkedItems=[0];
            }
            else {
                $checkedItems=[];
            }
            @endphp


            <x-forms.checkboxcc name="is_active" :checklist="$checklist" :checkedItems="$checkedItems" />


            <x-forms.input type="file" name="image" label="Picture" />

           <P> old Image: <img src="{{asset('storage/products/'
        .$Product->image)}}" height="150"alt="no image"></P>

            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-dark mx-2">Cancle</button>
        </form>






</x-master>