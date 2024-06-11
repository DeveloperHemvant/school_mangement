<div class="flex flex-col mb-4">
    @if(isset($label))
        <label for="{{ $name }}" class="{{$labelclass}}">
            {{ $label }}
        </label>
    @endif
    <input type="{{$type ?? 'text'}}" name="{{ $name }}" id="{{ $name }}" value="{{ $value ?? '' }}" 
           class="{{$class}}"@if(isset($live) ) wire:model.{{ $live }}="{{ $model }}" @else wire:model="{{ $model }}" @endif />
</div>
