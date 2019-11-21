

function do_xhr(method, addr, args, callback) {
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.status == 200) {
        callback(this.responseText);
      }
    };
    if (method == 'POST') {
      xhttp.open(method, addr, true);
      xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      // xhttp.setRequestHeader('Cookie', 'cookie=123456seven');
      xhttp.send(args);
    } else if (method == 'GET') {
      if (args) {
        xhttp.open(method, addr + '?' + args, true);
        xhttp.setRequestHeader(
          'Content-type',
          'application/x-www-form-urlencoded'
        );
        // xhttp.setRequestHeader('Cookie', 'cookie=123456seven');
        xhttp.send();
      } else {
        xhttp.open(method, addr, true);
        xhttp.setRequestHeader(
          'Content-type',
          'application/x-www-form-urlencoded'
        );
        // xhttp.setRequestHeader('Cookie', 'cookie=123456seven');
        xhttp.send();
      }
    } else {
      throw method + ' is not a valid method in this context';
    }
  }