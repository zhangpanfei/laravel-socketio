<ul class="nav nav-pills nav-stacked">
  <li role="presentation" class="{{(isset($active) and $active=='goods')?'active':''}}"><a href="{{url('admin/goods')}}">商品管理</a></li>
  <li role="presentation" class="{{(isset($active) and $active=='order')?'active':''}}"><a href="{{url('admin/order')}}">订单管理</a></li>
  <li role="presentation" class="{{(isset($active) and $active=='shop')?'active':''}}"><a href="#">商户管理</a></li>
</ul>