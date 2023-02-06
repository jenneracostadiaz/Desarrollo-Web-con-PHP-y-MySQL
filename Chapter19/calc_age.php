<?php
    $day = 06;
    $month = 12;
    $year = 1993;

    $bdayunix = mktime(0, 0, 0, $month, $day, $year);
    $nowunix = time();
    $ageunix = $nowunix - $bdayunix;
    $age = floor($ageunix / (365 * 24 * 60 * 60));

    echo 'Current age is '.$age.'.';
?>
<pre>
    <?php var_dump($bdayunix); ?>
    <?php var_dump($nowunix); ?>
    <?php var_dump($ageunix); ?>
    <?php var_dump($age); ?>
</pre>