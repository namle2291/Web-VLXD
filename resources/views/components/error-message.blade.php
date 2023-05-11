@php
    $name = $attributes['name'];
@endphp
@error($name)
    <p class="text-danger">{{$message}}</p>
@enderror