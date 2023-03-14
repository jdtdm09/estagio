@props(['type' => 'text', 'name', 'value' => null])

<input {{ $attributes->merge(['class' => 'form-input rounded-md shadow-sm']) }}
       type="{{ $type }}"
       name="{{ $name }}"
       value="{{ old($name, $value) }}">
