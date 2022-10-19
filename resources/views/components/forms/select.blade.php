@props(['name', 'label' => '' ,
'values'=>'','selectedval' => [] ])




<div class="mb-3 ">
    @php
    //dd($selectedval); @endphp
    @if($label)
    <label for="{{ $name }}Input">{{ $label }}<br>
        @endif
        <select id="{{ $name }}Input" class="form-control" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>
            <option value="" disabled selected>--{{ $label }} --</option>


            @foreach ($values as $keys=>$value)


            <option value="{{ $keys}}" @if($keys==$selectedval) selected @endif>
                {{ $value}}
            </option>
            @endforeach


        </select><br>


        @error($name)
        <div class="form-text text-danger">{{ $message }}</div>
        @enderror
</div>