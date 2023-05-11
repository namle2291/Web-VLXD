<x-onlyheader title="{{ $tintuc->tieude }}">
    @section('style')
        <style>
            img {
                width: 70%;
            }
        </style>
    @endsection
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-9">
            <h3>{{ $tintuc->tieude }}</h3>
            <div class="mt-3">
                {!! $tintuc->noidung !!}
            </div>
        </div>
    </div>
</x-onlyheader>
