<!DOCTYPE html>
<html>
<head>
   <title>Browse Directories</title>
</head>
<body>
   <h1>Browsing</h1>

<?php
    $dir = dir('./uploads/');
    echo '<p>Handle is '.$dir->handle.'</p>';
    echo '<p>Upload directory is '.$dir->path.'</p>';
    echo '<p>Directory Listing:</p>';
    while (false !== ($file = $dir->read())) {
        //elimina las dos enrtadas de . y ..
        if($file != "." && $file != "..") {
         echo '<li>'.$file.'</li>';
       }
    }

?>

</body>
</html>