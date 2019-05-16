<?php
    $db = mysqli_connect('localhost', 'root', '', 'task2') or die('DB Failure: ' . mysqli_error());

    $answers = array();

    $query = mysqli_query($db, "SELECT * FROM answers");

    while($row = mysqli_fetch_assoc($query))
    {
        $answers[] = $row;
    }

    if (isset($_POST['login']))
    {
        echo "Logged in!";

        $username = $_POST['username'];
        $passed = false;

        $query = "SELECT pass FROM attempts WHERE username = '$username'";
        $result = mysqli_query($db, $query);
        $numRows = mysqli_num_rows($result);
        $rows = mysqli_fetch_assoc($result);
        if ($numRows === 5)
        {
            echo "No attempts left.";
        }
        elseif ($numRows < 5)
        {
            $count = 0;
            while ($rows['pass'] != 1)
            {
                if ($rows['pass'] == 1)
                {
                    $passed = true;
                }
                $count++;
                if($count === $numRows)
                {
                    break;
                }
            }
            if ($passed == true)
            {
                echo "You have already passed the quiz";
            }
        }

    }

    if (isset($_POST['uploadAnswers']))
    {
        $file = file_get_contents($_FILES['answers']['tmp_name']);

        $file = explode("\n", $file);

        foreach($file as $file)
        {
            $file = explode(",", $file);            
        }

        array_walk($file, 'trim_value');

        //Compare answers
        for ($i = 0; $i <= 40; $i++)
        {
            
        }
    }

    function trim_value(&$value)
    {
        $value = trim($value);
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