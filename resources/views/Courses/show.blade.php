<x-master>
    <x-slot:title>
        students Details
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">students Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
            </div>
            <a href="{{ route('Courses.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <h1>Title: {{ $Course->title }}</h1>
    <h1> Category: {{ $Course->category }}</h1>
    <h1>Type: {{ $Course->type }}</h1>
    <h1>Duration: {{ $Course->duration .".months"}}</h1>
    <h1>
        <p>Hobbies: @php $techs =json_decode($Course->technology) 
                       
                       @endphp 
                       @foreach($techs as $tech)
                      @if   (count($techs)< $techs)  {{$tech}},
                       @endif
                       @endforeach
           
        </p>
    </h1>

    <h1>
        <p>Start Date: {{ $Course->startdate }}
        </p>
    </h1>
 <P>Image: <img src="{{asset('storage/courses/'
        .$Course->image)}}" height="250"alt="no image"></P>
    




</x-master>