@props(['name', 'type' => 'text',  'label' => '' ,
'value' =>'' ,'options'=>''])

<div class="form-check">
                

                @if($label)
        <label for="{{ $name }}Input" class="form-label">{{ $label }}</label>
    @endif
                <br>

                <input type="{{$type}}" value="{{$value}}" name="{{$name}}" 
                id="{{ $name }}Input" @if($value==$options) checked @endif> {{$value}}: <br>

                
                

                

            </div>
            @error($name)
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror



         {{--    <div class="form-group">

    <label><strong>{{$label}}</strong></label><br>
    <label><input type="radio" name="type" > {{$value}}</label>
    @error('name')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>

--}} 