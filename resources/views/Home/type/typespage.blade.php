<ul class="clearfix">
@foreach($goods as $good)
<li> <a href="#"> <img src="/{{$good->goods_pic}}" /></a> <p class="head-name"><a href="#" style="font-size:12px;color:black;">{{$good->goods_describe}}</a> </p> <p><span class="price">￥{{$good->goods_price}}</span></p> <p class="head-futi clearfix"><span class="fl">好评度：90% </span> <span class="fr">100人购买</span></p> <p class="clearfix"><span class="label-default fl">抢购</span> <a href="#" class="fr pc-search-c" style="color:black;">收藏</a> </p> </li> 
@endforeach
</ul> 
