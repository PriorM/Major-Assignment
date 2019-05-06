<html>
    <head>
    </head>
    <body>
    </body>
    <?php
        //Opens database connection and starts session
        $db = mysql_connect('localhost', 'root', '', 'task1') or die('DB Failure: '.mysql_error());
        session_start();
        $sid = session_id();
    ?>
</html>