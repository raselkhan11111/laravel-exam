<div class="mb-3 ">

    @if($label)
        <label for="{{ $name }}Input">{{ $label }}<br>
    @endif
    
    <select id="{{ $name }}Input" class="form-control" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>
        <option value="" disabled>--{{ $label }} --</option>
        @foreach ($values as $key=>$value)
        <option value="{{ $key }}" @if($key==$selectedval) selected @endif>
            {{ $value }}
        </option>
        @endforeach
    </select><br>
    
    @error($name)
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
