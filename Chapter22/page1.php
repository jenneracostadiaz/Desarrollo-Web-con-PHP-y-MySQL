<?php 
    session_start();

    $_SESSION['session_var'] = "Hellor world!";

    echo 'The content of $_SESSION[\'session_var\'] is '.$_SESSION['session_var'].'<br />';
?>
<p><a href="page2.php">Next Page</a></p>