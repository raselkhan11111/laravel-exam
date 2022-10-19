<x-master>
    <x-slot:title>
        Courses create
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Courses</h1>
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



        <x-forms.errors />

        <form action="{{route('Courses.store')}}" method="post" enctype="multipart/form-data">

            @csrf



            <x-forms.input type="text" name="title" label="Name"
             class="bg-info" value="{{old('title')}}"
             required placeholder="Enter name" />

            {{-- select, checkbox, radio, texarea --}}



            <x-forms.select name="category" label="Select category" :values="[
                            'T-Shirt' => 'T-Shirt',
                             'Jeans' => 'Jeans',
                            'Glasses' => 'Glasses',
                            
                 ]" />




            <x-forms.radio type="radio" name="type" label="Type" value="Online" />
            <x-forms.radio type="radio" name="type" value="Offline" />

           
            <x-forms.checkboxcc name="technology" label="technology" :checklist="['Html','CSS','PHP',]" />


            <x-forms.input type="number" name="duration" value="{{old('duration')}}"
             label="Course Duration" class="bg-info" 
             required placeholder="Enter " />


          
            <x-forms.input type="date" name="startdate" label="Start Time"  value="{{old('startdate')}}" class="bg-info" required />


            <x-forms.input type="file" name="image" label="Picture"   />




            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-dark mx-2">Cancle</button>
        </form>






</x-master>