var http = require('http').Server();
var io = require('socket.io')(http);
var Redis = require('ioredis');

var redis = new Redis();

redis.subscribe('order_info');

redis.on('message', function(channel, message){
	var data = JSON.parse(message);
	io.emit('order_create',data);
});


io.on('connection', function (socket) {
	var ioInfo = {};
	ioInfo.count = io.eio.clientsCount;  // 链接数量
	ioInfo.rooms = socket.adapter.rooms // 所有房间
	ioInfo.connect = socket.nsp.connected // 所有链接
	console.log(ioInfo);
})

http.listen(3000);