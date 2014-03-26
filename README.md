RESTful API
========

A simple REST API, based on the PHP 5.3. It implemetns base rules of the RESTful API. If you need some simple RESTful API for your application, I believe it's something that you need.

Classes are loaded according to the <a href='https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md' target='_blank'>PSR-0 Autoloading Standard</a>. 

Router is designed for simple urls. For the router work, you need to add the routing rules in the config / resources.php file. Each rule consists of:<br>
  &nbsp;&nbsp;&nbsp;&nbsp;'<b>resource</b>' - on which url you'll request the data<br>
  &nbsp;&nbsp;&nbsp;&nbsp;'<b>controller</b>' - name of the controller<br>
  &nbsp;&nbsp;&nbsp;&nbsp;'<b>action</b>' - name of the action<br>

For work with database, you have to copy the '<i>config/config.sample.php</i>'. Rename the copy as '<i>config.php</i>' and set credentials for your database. All Models extend the <b>DbAdapter</b> that is a simple wrapper for <a href='http://php.net/manual/en/book.mysqli.php' target='_blank'>MySqli</a>.

All controllers extended from <b>AbstractController</b>. It realizes the methods for work with requests and incomming data (getting, cleanning).
