var http = require('http').Server();
var request = require('request');
var io = require('socket.io')(http,{
		pingTimeout: 5000,
	});
var Redis = require('ioredis');

var redis = new Redis();

redis.subscribe('order_info');

redis.on('message', function(channel, message){
	var data = JSON.parse(message);
	var socket_id = data.data.client_id;
	socket_id.forEach(function(item){
		console.log(item);
		io.to(item).emit('order_create',data);
	});
	//io.emit('order_create',data);
});


io.on('connection', function (socket) {
	var ioInfo = {};
	ioInfo.count = io.eio.clientsCount;  // 链接数量
	ioInfo.rooms = socket.adapter.rooms // 所有房间
	ioInfo.connect = socket.nsp.connected // 所有链接
	//console.log(ioInfo);
	socket.on('disconnect',function(){
		request.get('http://localhost:81/admin/socket/rem',{qs:{socket_id:socket.id}},function(error,response,body){
			console.log(body);
		});
	});

});


http.listen(3000);

//文档参考 http://www.cnblogs.com/lxxhome/p/5980615.html
//文档参考 https://socket.io/docs/server-api/