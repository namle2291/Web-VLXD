<ul class="list-group">
    @foreach ($danhmuc as $item)
    <li class="list-group-item">
        <a href="{{route('trangchu.danhmucsp',$item->id)}}">{{$item->tendanhmuc}}</a>
    </li>
    @endforeach
</ul>