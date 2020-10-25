var appx      =     require("express");
var app       =     appx();
var mysql     =     require("mysql");
var httpx     =     require('http');
var http      =     httpx.Server(app);
var io        =     require("socket.io")(http);

/* Creating POOL MySQL connection.*/

var pool    =    mysql.createPool({
  host      : 'localhost',
  user      : 'root',
  password  : '',
  database  : 'haul_prod',
  debug     : false
});

function rtrim(str, chars) {
  chars = chars || "\s";
  return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

io.on('connection',function(socket){
  console.log('a user connected');
  socket.on('disconnect', () => {
    console.log('user disconnected');
  });

  socket.on('request_record_rom', function(data) {
    url = "http://127.0.0.1/hauling_prod/Ajax/record_rom/";
    var data = "";
    var request = httpx.get(url, function (response) {
      var buffer = "";
      response.on("data", function (chunk) {
        buffer += chunk;
      });
      response.on("end", function (err) {
        data = JSON.parse(buffer);
        io.emit('record_rom', data);
      });
    });
  });
});

http.listen(9518,function(){
  console.log("Listening on 9518");
});
