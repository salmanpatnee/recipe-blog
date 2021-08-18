@props(['name'])

<x-form.label name="{{$name}}"/>

<textarea class="border border-gray-300 p-2 w-full rounded" name="{{$name}}" id="{{$name}}" cols="10" rows="2">
    {{ old($name) }}
</textarea>
<x-form.error name="{{$name}}"/>