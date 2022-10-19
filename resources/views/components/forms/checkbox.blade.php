@props(['name', 'label' => '' ,'checkedItems'=>'',
'values'=>''])

<div> 
    @if($label)

<label class="form-check-label" for="{{ $name}}Input">{{ $label }}</label>
@endif
                <div class="mb-3 form-check">

                @foreach ($values as $value)
                 <input type="checkbox" name="{{ $name}}[]" id="{{ $name}}Input" 
                value="{{$value}}"
                {{$checkedItems}} >{{$value}}:
                    
                @endforeach
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                @error($name)
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror

            </div>