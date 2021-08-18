@props(['name', 'type' => 'text'])

<x-form.label name="{{$name}}"/>

<input class="border border-gray-300 p-2 w-full rounded" type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{ old($name) }}"
    >

<x-form.error name="{{$name}}"/>