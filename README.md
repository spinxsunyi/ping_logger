# ping_logger

Simple program to monitor your home internet access.

![alt text](https://github.com/spinxsunyi/ping_logger/blob/master/screenshot_v1.jpeg)

Run in your raspberryPi and monitor your home internet access. Ping to google.com or any host and record the time recording and ping result in database. Monitor result in Graph and table. Monitor page are auto load. If PING was failed or connection down, ping result will show -1.

Code in pHP, database MySQL and chart with canvas.js


Instalation:
1. Clone this repo in your webserver directory
2. Create database and import the template
3. Run ping.php in backgorund using "php ping.php &"
4. Monitor the result by index.php

V.1
- Monitor in graph and table
- Auto refresh page

Next development.
- Notification when down
- Dynamic graph
- Dynamic table


Chart using canvas.js
reference: https://canvasjs.com/php-charts/line-chart/