var Redis = require('ioredis');
var request = require('request');

/*var redis = new Redis();

var clis = redis.smembers('SocketId').then(function(obj){
	console.log(obj);
},function(error){
	console.log(error);
});*/
/*request.get('http://localhost:8000/admin/socket/rem?socket_id=11',function(error,response,body){
			console.log(error);
});*/
request.get('http://localhost:81/admin/socket/rem?socket_id=11',{qs:{name:123}},function(error,response,body){
			console.log(error);
});