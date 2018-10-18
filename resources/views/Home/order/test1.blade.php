      <div id="uid1">
               <div class="member-return H-over" style="display:none;">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix">
                       <ul>

                           @foreach($data1 as $vv)
                           @if($vv->order_state==1)
                        <!-- {{var_dump($v)}} -->
                           <li>
                               <div class="member-minute clearfix">
                                   <span>{{date('Y-m-d H:m:s',$vv->order_addtime)}}</span>
                                   <span>订单号：<em>{{$vv->order_sn}}</em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                      @foreach($vv->dev as $valv)
                                       <div class="ci7 clearfix" >
                                           <span class="gr1"><a href="/homepage/{{$valv['id']}}"><img src="/{{$valv['goods_pic']}}" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2" style="width:230px">{{$valv['goods_name']}}</span>
                                           <span class="gr3">X{{$valv['num']}}</span>
                                       </div>
                                      @endforeach
                                      
                                   </div>
                                   <div class="ci2">{{$vv->name}}</div>
                                   <div class="ci3"><b>￥{{$vv->order_amount}}</b><p>线上支付</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p>{{date('Y-m-d',$vv->order_addtime)}}</p></div>
                                   <div class="ci5">
                                   <div class="statue{{$v->order_id}}">
                                  @if($vv->order_state==1)
                                   <p>等待付款</p>
                                   <p><a href="javascript:;">物流跟踪</a></p>
                                  @elseif($vv->order_state==2)
                                  <p>等待发货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  @elseif($vv->order_state==3)
                                  <p><a href="javascript:;">等待收货</a></p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  @elseif($vv->order_state==4)
                                  <p>已收货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  @elseif($vv->order_state==0)
                                  <p>交易关闭</p>
                                  @endif
                                    
                                   </div>
                                   <p><a href="/homeorder/{{$vv->order_id}}">订单详情</a></p></div>
                                   <div class="ci5 ci8">
                                    <div class="getup{{$vv->order_id}}">
                                  @if($vv->order_state==1)
                                   <p>剩余15时20分</p> <p><a href="#" class="member-touch">立即支付</a> </p>
                                   <p><a href="javascript:;" onclick="cancel(this,{{$vv->order_id}})">取消订单</a> </p>
                                    
                                  @elseif($vv->order_state==3)
                                  <p>剩余6天23小时</p> <p><a href="javascript:;" onclick="getup({{$vv->order_id}})" class="member-touch">确认收货</a> </p>
                                  <p><a href="javascript:;" onclick="cancel(this,{{$vv->order_id}})">取消订单</a> </p>
                                   
                                  @elseif($vv->order_state==4)
                                  <p><a href="">快去评论</a></p>
                                  @elseif($vv->order_state==2)
                                  <p><a href="javascript:;">申请退款</a></p>
                                  @endif
                                    </div>
                                   <p><a href="javascript:;" onclick="del(this,{{$vv->order_id}})">删除订单</a> </p></div>
                               </div>
                           </li>
                           @endif
                          @endforeach
                          
                       </ul>
                   </div>
                   <div class="clearfix" style="padding:30px 20px;">
                    <div class="fr pc-search-g pc-search-gs">
                        <a style="display:none" class="fl " href="#">上一页</a>
                        @foreach($pp1 as $row1)
                        <a href="javascript:;" onclick="page1({{$row1}})">{{$row}}</a>
                        @endforeach
                        <a title="使用方向键右键也可翻到下一页哦！" class="" href="javascript:;">下一页</a>
                    </div>
                </div>
               </div>
            </div>
