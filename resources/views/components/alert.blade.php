@php
    $color = $attributes['color'];
    $message = $attributes['message'];
    $content = Session::get($message);
@endphp
@if (Session::has($message))
    <div class="alert alert-{{ $color }} mt-3">
        {{ $content }}
    </div>
@endif
