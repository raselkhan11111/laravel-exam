@props(['name', 'type' => 'text', 'label' => '' ,'value'=>''])

<div class="mb-3">
    @if($label)
    <label for="{{ $name }}Input" class="form-label">{{ $label }}</label>
    @endif

   
    <textarea name="{{ $name }}" id="{{ $name }}Input" 
    {{ $attributes->merge(['class' => 'form-control','class' => 'w-100']) }}
    > {{$value}} </textarea>

    @error($name)
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror

</div>