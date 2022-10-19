<x-master>
    <x-slot:title>
        Products Details
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
            </div>
            <a href="{{ route('Products.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <h1>Name: {{ $Product->title }}</h1>
    <h1>Price: {{ $Product->price}}</h1>
    <h1>category name: @foreach($Allcates as $ca)
                        @if($Product->category_id==$ca->id)

                        {{$ca->title}}

                        @endif

                        @endforeach</h1>
    <h1>Description: {{ $Product->description }}</h1>
    <h1>
        <p>Is active: {{ $Product->is_active ? 'Yes' : 'No' }}
           
            <br>
            @if ($Product->hobbies3==true){{ $Product->hobbies3 ? 'Singing' : 'No' }} @endif
        </p>
    </h1>

    
    <P> <h1> Image:</h1> <img src="{{asset('storage/products/'
        .$Product->image)}}" height="250"alt="no image"></P>

</x-master>