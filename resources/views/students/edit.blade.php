<x-master>
    <x-slot:title>
        Student Edit
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
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






        <form action="{{route('students.update',$student->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            <div class="mb-3">
                <label for="nameInput" class="form-label">Name</label>
                <input type="text" value="{{$student->name}}" name="name" class="form-control" id="nameInput" aria-describedby="nameHelp">
                <div id="nameHelp" class="form-text">We'll never share your name with anyone else.</div>
            </div>




            <div class="mb-3">
                <label class="form-check-label" for="exampleCheck1">Date of Birth</label>
                <input type="date" value="{{$student->date_of_birth}}" name="date_of_birth" class="" id="exampleCheck1">
                <p> Date :{{$student->date_of_birth}} </p>

            </div>
            <div class="form-check">
                <label for="">
                    Select Gender
                </label>
                <br>

                <input type="radio" value="Male" name="gender" id="flexRadioDefault1" @if ($student->gender=="Male") checked @endif >Male <br>

                <input type="radio" value="Female" name="gender" id="flexRadioDefault1" @if ($student->gender=="Female") checked @endif >Female<br>
                <input type="radio" value="Other" name="gender" id="flexRadioDefault1" @if ($student->gender=="Other") checked @endif> Other:




            </div>



            <div> <label class="form-check-label" for="exampleCheck1">Hobbies</label>
                <div class="mb-3 form-check">
                    Reading books <input type="checkbox" name="hobbies1" class="form-check-input" id="exampleCheck1" @if ($student->hobbies1) checked @endif>

                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="mb-3 form-check">

                    Games <input type="checkbox" name="hobbies2" @if ($student->hobbies2) checked @endif>

                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="mb-3 form-check">

                    Singing <input type="checkbox" name="hobbies3" @if ($student->hobbies3) checked @endif>
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>

            </div>

            <div class="mb-3 ">
                <label for="nationality">nationality:</label><br>

                <select id="nationality" class="form-control" name="nationality">

                    <option value="" disabled selected>(Select
                        Nationality)
                    <option value="Bangladesh" @if ($student->nationality=="Bangladesh") selected @endif >Bangladesh</option>
                    <option value="Indian" @if ($student->nationality=="Indian") selected @endif>Indian</option>
                    <option value="American" @if ($student->nationality=="American") selected @endif>American</option>
                </select><br>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-dark mx-2">Cancle</button>
        </form>






</x-master>