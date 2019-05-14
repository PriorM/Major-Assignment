<?php
    $db = mysqli_connect('localhost', 'root', '', 'task2') or die('DB Failure: ' . mysqli_error());

    if (isset($_POST['login']))
    {
        echo "Logged in!";
    }

    if (isset($_POST['uploadAnswers']))
    {
        
    }
?>
<html>
    <head>
        <title>Exam site</title>
    </head>
    <body>
        <center>
            <form form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                Username: <input type="text" name="username" /> <br />
                Password: <input type="password" name="pword" /> <br />
                <input type="submit" name="login" value="Login" />
            </form>
            <br />
            <br />
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h4>Upload Answers</h4>
                <input type="file" name="answers" /> <br /> <br />
                <input type="submit" name="uploadAnswers" value="Upload" />
            </form>
        </center>
    </body>
</html>