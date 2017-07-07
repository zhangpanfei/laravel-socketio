<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            body{
                width: 1024px;
                /*margin:0 auto;*/
            }
            .admin_navi{
                color:#fff;
                height: 50px;
            }
            .admin_navi div{
                height: 100%;
                line-height: 50px;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
          <div class="container">
            <div class="row admin_navi">
                <div class="col-md-1" style="margin-left:-30px">后台管理</div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1" style="position: relative;">新消息<span id="msg" style="position: absolute;top:5px;background: red;height: 20px;width:20px;line-height: 20px;border-radius: 30px;text-align: center;display: none">1</span></div>
                <div class="col-md-1"></div>
                <div class="col-md-1">小黑(admin)</div>
                <div class="col-md-1"></div>
                <div class="col-md-1">退出</div>
            </div>
          </div>
        </nav>
        <div style="margin-top:60px">
            <div class="pull-left" style="width:25%">
            @include('layouts.admin_navi')
            </div>
            <div style="width:60%;margin-left:5%" class="pull-left">
            @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/1.12.3/jquery.js"></script>
    <script src="https://cdn.bootcss.com/socket.io/2.0.3/socket.io.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/layer/3.0.1/layer.js"></script>
    <script>
        var msgCount = 0; 
        function order_alert(data){
            //边缘弹出
            layer.open({
              type: 1
              ,offset: 'rb' //具体配置参考：offset参数项
              ,content: `<div style="padding: 20px 80px;">用户 ${data.user.name} 购买了 ${data.goods.name} ,订单号为: ${data.order_no},请赶快发货</div>`
              ,btn: '关闭全部'
              ,btnAlign: 'c' //按钮居中
              ,shade: 0 //不显示遮罩
              ,yes: function(){
                layer.closeAll();
              }
            });
        }

        var socket = io('127.0.0.1:3000');
        socket.on('order_create',function(msg){
            var order = msg.data.order;
            //console.log(data);
            order_alert(order);
            $('#msg').text(++msgCount);
            $('#msg').show()
        });
    </script> 
    </body>
</html>
