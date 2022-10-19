@props(['name'=> '', 'checklist'=>'', 'checkedItems' => []])

@foreach($checklist as $key=>$value)


{{-- @php dd($df=(in_array($key, $checkedItems))); @endphp --}}
<div class="mb-3 form-check">

    <input 
        name="{{ $name }}[]" 
        type="checkbox" 
        id="{{ $key }}Input" 
        value="{{$value}}"
       
        {{ $attributes->merge(['class' => 'form-check-input']) }}
        @if(in_array($key, $checkedItems)) checked @endif
    >

    <label class="form-check-label" for="{{ $key }}Input">{{ $value }}</label>

</div>
@endforeach


