var express = require('express'),
  app = express(),
  server;

app.get('/', function (req, res) {
  res.send('Hello World');
});

server = app.listen(3000, function () {
  console.log('listening on port %d', server.address().port);
});
