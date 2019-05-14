<?php
echo 'Please wait';
while (true) {
     echo ' .';
    ob_flush(); //send the output buffer
    flush(); //this attempts to push current output all the way to the browser
    sleep(1);
}
?>
