var appx      =     require("express");
var app       =     appx();
var httpx     =     require('http');
var http      =     httpx.Server(app);
var io        =     require("socket.io")(http);


io.on('connection',function(socket){
  socket.on('request_record_rom', function(data) {
    io.emit('reload_record_rom', data);
  });

  socket.on('request_pos', function(data) {
    io.emit('reload_pos', data);
  });

   socket.on('request_65', function(data) {
    io.emit('reload_65', data);
  });


});

http.listen(9518,function(){
  console.log("Listening on 9518");
});
