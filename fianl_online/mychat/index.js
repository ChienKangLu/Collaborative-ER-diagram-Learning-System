/*
var app = require('express')();
var http = require('http').Server(app);

app.get('/', function(req, res){
  //res.send('<h1>Hello world</h1>');
  res.sendFile(__dirname + '/index.html');
});

http.listen(3000, function(){
  console.log('listening on *:3000');
});
*/
var express = require('express');
var app = express();
var name;
var session = require('express-session');

var qs = require('querystring');
var url = require('url');

app.use(express.static(__dirname + '/public'));//存取外部檔案
//app.use(express.cookieParser());

var http = require('http').Server(app);
var io = require('socket.io')(http);
var moment = require('moment');
//moment().format();

app.get('/', function(req, res){
  res.sendFile(__dirname +'/index2.html');
});
var cookieParser = require('cookie-parser');
app.use(cookieParser());
app.get('/test', function(req, res) {
	res.sendFile(__dirname +'/index2.html');
    console.log(req.query.name);
    console.log(req.query.id);
    console.log(req.query.groupid);
    console.log(req.query.ques);
	/*設置cookie  start*/
	var people={};
	people["name"]=req.query.name;
	people["id"]=req.query.id;
	people["groupid"]=req.query.groupid;
	people["ques"]=req.query.ques;
	res.cookie('gon_mychat_user',JSON.stringify(people), { maxAge: 1000*60*60*24*30});
	console.log("Cookies: ", req.cookies.gon_mychat_user);
	console.log(JSON.stringify(people));
	/*設置cookie  end*/
});

var member={};
io.on('connection', function(socket){
	
  socket.on('disconnect', function(){
	var json={};
	json["name"]=socket.name;
	json["id"]=socket.id;
	json["groupid"]=socket.groupid;
	if(member[socket.groupid][socket.id]){//防止error				
		//logout(socket.id);
		delete member[socket.groupid][socket.id];//有錯的可能性
		member[socket.groupid]["count"]=member[socket.groupid]["count"]-1;
		json["people"]=JSON.stringify(member[socket.groupid]);
		console.log(socket.name +' 離開房間');
		///////////////////////////
		
		
		
		///////////////////////////
		
		io.emit('chat message',"leave",JSON.stringify(json));
	}
  });
  
  socket.on('newpeople',function(user) { 

	  socket.name=user["name"];
	  socket.id=user["id"];
	  socket.groupid=user["groupid"];
	  console.log(socket.name+" 進入房間");
	  if(member[socket.groupid]){
		  member[socket.groupid][socket.id]=socket.name;
		  member[socket.groupid]["count"]=member[socket.groupid]["count"]+1;
	  }else{
		  member[socket.groupid]={};
		  member[socket.groupid][socket.id]=socket.name;
		  member[socket.groupid]["count"]=1;
	  }
	  
	  //console.log("hihi~~"+member[socket.groupid][socket.id]);
	  
	  var json={};
	  json["name"]=socket.name;
	  json["id"]=socket.id;
	  json["groupid"]=socket.groupid;
	  json["people"]=JSON.stringify(member[socket.groupid]);
	  //console.log(json["people"]);
	  io.emit('chat message',"newConnect",JSON.stringify(json));
 });
   socket.on('chat message', function(way,msg){
    //console.log('sendpeople: ' + msg);
    //console.log('nowuser: ' + JSON.stringify(people));
	
	//console.log("haha~"+app.locals.name);
	var now = moment(new Date());
	//var date = now.format('YYYY-MM-DD hh:mm:ss');
	var date = now.format('hh:mm:ss');
	console.log(date);
	console.log(msg);
	var json=JSON.parse(msg);
	json["time"]=date;
	//if(people["groupid"]==json["groupid"]){
	 io.emit('chat message',"chatting",JSON.stringify(json));//server 廣播給大家
	//}
  });
  
});

http.listen(3000, function(){
	
  console.log('listening on *:3000');
});

