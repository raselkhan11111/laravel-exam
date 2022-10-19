<x-master>
    <x-slot:title>
        Course Edit
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Course</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export Excel</button>
                </div>

                <a href="{{route('Courses.index')}}"> <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        List
                    </button> </a>
            </div>
        </div>



        <x-forms.errors />

        @php
        $technology=json_decode($Course->technology)

        @endphp
        <!-- <form action="{{route('Courses.update',$Course->id)}}" method="post" enctype="multipart/form-data"> -->
        <form action="{{route('Courses.update',$Course->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')
            <input type="hidden" value="{{$Course->id}}" name='id'>


          



            <x-forms.input type="text" name="title" label="Name" class="bg-info" value="{{ old('title', $Course->title) }}" required placeholder="Enter name" />

            {{-- select, checkbox, radio, texarea --}}





            @php
            $valuelist=[
                            'Short' => 'Short',
                             'Long' => 'Long',
                            'Diploma' => 'Diploma',
                            
                 ];
            
                    if($Course->category=="Short") {
                        $selectedCourses="Short" ;
                    }
                    elseif ($Course->category=="Long") {
                    $selectedCourses="Long" ;}
                    elseif ($Course->category=="Diploma"){

                        $selectedCourses="Diploma" ; 
                    }
                   
                


            @endphp
            <x-forms.select name="category" label="Select category" :values="$valuelist" 
            :selectedval="$selectedCourses" />

            @php
             $valueTocheck=$Course->type;
           //  dd($valueTocheck);

@endphp
            <x-forms.radio type="radio" name="type" label="Type" value="Online" :options="$valueTocheck"/>
            <x-forms.radio type="radio" name="type" value="Offline" :options="$valueTocheck"  />
             @php
            $checklist=['Html'];
            $checklist1=['CSS'];
            if(in_array('Html',$technology)) {
            $checkedItems="Checked";}
            else{
            $checkedItems="''";
            }


            @endphp




            <x-forms.checkbox name="technology" label="technology" 
            :values="$checklist" :checkedItems="$checkedItems" />

            @php

            $checklist1=['CSS'];


            if(in_array('CSS',$technology)) {
            $checkedItems1="Checked";}
            else{
            $checkedItems1="''";
            }


            @endphp
            <x-forms.checkbox name="technology" :values="$checklist1" :checkedItems="$checkedItems1" />

            @php

            $checklist2=['PHP'];


            if(in_array('PHP',$technology)) {
            $checkedItems2="Checked";}
            else{
            $checkedItems2="''";
            }

            @endphp
            <x-forms.checkbox name="technology" :values="$checklist2" :checkedItems="$checkedItems2" /> 


            {{-- @php
            $checklist = ['Html','CSS','PHP',];
            if($Course->is_active){
                $checkedItems=[0];
            }
            else {
                $checkedItems=[];
            }
            @endphp


            <x-forms.checkboxcc name="is_active" :checklist="$checklist" :checkedItems="$checkedItems" /> --}}
         
         
            <x-forms.input type="number" name="duration" label="Course Duration" 
            value="{{ old('duration', $Course->duration) }}"
            class="bg-info" required placeholder="Enter " />



            <x-forms.input type="date" name="startdate" value="{{ old('startdate', $Course->startdate) }}"
            label="Start Time" class="bg-info" required />




            <x-forms.input type="file" name="image" label="Picture"   />
            <P> old Image: <img src="{{asset('storage/courses/'
        .$Course->image)}}" height="150"alt="no image"></P>




            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-dark mx-2">Cancle</button>
        </form>






</x-master>