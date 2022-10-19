<x-master>
    <x-slot:title>
        Student create
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">students</h1>
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


        <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="nameInput" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="nameInput" aria-describedby="nameHelp">
                <div id="nameHelp" class="form-text">We'll never share your name with anyone else.</div>
            </div>
            <div class="mb-3">
                <label class="" for="exampleCheck1">Date of Birth</label>
                <input type="date" name="date_of_birth" class="" id="exampleCheck1">


            </div>
            <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault1">
                    Select Gender
                </label>
                <br>

                <input type="radio" value="Male" name="gender" id="flexRadioDefault1"> Male : <br>

                <input type="radio" value="Female" name="gender" id="flexRadioDefault12">Female : <br>
                <input type="radio" value="Other" name="gender" id="flexRadioDefault12"> Other:




            </div>
            <div> <label class="form-check-label" for="exampleCheck1">Hobbies</label>
                <div class="mb-3 form-check">
                    Reading books <input type="checkbox" name="hobbies1" class="form-check-input" id="exampleCheck1">

                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="mb-3 form-check">

                    Games <input type="checkbox" name="hobbies2" class="form-check-input" id="exampleCheck1">

                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="mb-3 form-check">

                    Singing <input type="checkbox" name="hobbies3" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>

            </div>

            <div class="mb-3 ">
                <label for="nationality">nationality:</label><br>

                <select id="nationality" class="form-control" name="nationality">
                    <option value="">--select--</option>

                    <option value=" Bangladesh">Bangladesh</option>
                    <option value="Indian">Indian</option>
                    <option value="American">American</option>
                </select><br>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-dark mx-2">Cancle</button>
        </form>






</x-master>