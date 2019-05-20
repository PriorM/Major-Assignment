<?php
    $db = mysqli_connect('localhost', 'root', '', 'task5') or die('DB Failure: ' . mysql_error());

    $debts = array();

    $query = mysqli_query($db, "SELECT * FROM debt");

    while($row = mysqli_fetch_assoc($query))
    {
        $debts[] = $row;
    }

    date_default_timezone_set('Australia/Sydney');

    function count_days($a, $b)
    {
        $a_parts = getdate($a);
        $b_parts = getdate($b);

        $a_new = mktime(12, 0, 0, $a_dt['mon'], $a_dt['mday'], $a_dt['year']);
        $b_new = mktime(12, 0, 0, $b_dt['mon'], $b_dt['mday'], $b_dt['year']);

        return round(abs($a_new - $b_new) / 86400);
    }

    function sendMail($person)
    {
        return 0;
    }

    $current = date("m/d/y");

    foreach($debts as $person)
    {
        $diff = count_days($current, $person['dueDate']);
        if ($diff !== 0)
        {
            continue;
        }
        if ($diff === 0)
        {
            sendMail($person);
        }
    }
?>