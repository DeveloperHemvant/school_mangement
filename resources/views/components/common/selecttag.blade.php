<div class="flex flex-col mb-4">
    @if(isset($label))
        <label for="{{ $name }}" class="{{ $labelclass }}">
            {{ $label }}
        </label>
    @endif
    <select name="{{ $name }}" id="{{ $name }}" class="{{ $class }}" @if(isset($multiple)) multiple="{{ $multiple }}" @endif @if(isset($live)) wire:model.{{ $live }}="{{ $model }}" @else wire:model="{{ $model }}" @endif >
        <option value="" >
           Select {{ $name }}
        </option>
        @foreach($options as  $value)
            <option value="{{ $value->id }}" >
                {{ $value->name}}
            </option>
        @endforeach
    </select>
</div>
