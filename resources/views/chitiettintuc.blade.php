<x-onlyheader title="{{ $tintuc->tieude }}">
    @section('style')
        <style>
            .noidung_tintuc img {
                max-width: 100%;
            }
        </style>
    @endsection
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-9">
            <h3>{{ $tintuc->tieude }}</h3>
            <div class="mt-3 noidung_tintuc">
                {!! $tintuc->noidung !!}
            </div>
        </div>
    </div>
</x-onlyheader>
