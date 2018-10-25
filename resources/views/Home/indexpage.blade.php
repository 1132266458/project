<ul id="uid">
@foreach($goods as $row)
<li>
    <a href="">
        <img src="/{{$row->goods_pic}}">
        <p class="head-name pc-pa10">{{$row->goods_describe}}</p>
        <p class="label-default">3.45折</p>
    </a>
</li>
@endforeach
</ul>

