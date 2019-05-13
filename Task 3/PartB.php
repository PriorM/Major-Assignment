<?php
echo 'Please wait';
while (true) {
     echo ' .';
    // not using ob_flush causes the risk of exceeding socket timeouts    
    //ob_flush(); //send the output buffer
    flush(); //this attempts to push current output all the way to the browser
    sleep(1);
}
?>
