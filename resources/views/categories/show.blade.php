<x-master>
    <x-slot:title>
        Category Details
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Category</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('categories.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="list"></span>
                        List
                    </button>
                </a>
            </div>
        </div>

        <h1>Title: {{ $category->title }}</h1>
        <img src="{{ asset('storage/categories/'.$category->image) }}" height="80" />
        <p>Active : {{ $category->is_active ? 'Yes' : 'No' }}</p>





      {{--  <div class="card">
            <div class="card-header">
                <h3 class="card-title">Maximizable Card Example</h3>
                <div class="card-tools">
                    <!-- Maximize Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                pppp

            </div> --}}



            <div class="py-3 py-md-5 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4">Available Products</h4>
                        </div>
                        @foreach($products as $key=>$product )
                        <div class="col-md-3">
                            <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">{{$product->title }}</h3>
                <div class="card-tools">
                    <!-- Maximize Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
                <!-- /.card-tools -->
            </div>

                                <div class="product-card-img">
                                    <label class="stock bg-success">@if($product->is_active)In Stock @else Out of Stock @endif</label>

                                    <img src="{{ asset('storage/products/'.$product->image) }}" height="150" />
                                </div>
                                <div class="product-card-body">
                                    
                                    <h5 class="product-name">
                                        <a href="">
                                            {{$product->title }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">Price: {{$product->price}}</span>

                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
            <br>
            <br>




</x-master>