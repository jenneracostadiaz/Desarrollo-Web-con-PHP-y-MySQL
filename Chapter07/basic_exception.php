<?php 
    try{
        throw new Exception("Un terrible error", 42);
    } catch(Exception $e) {
        echo "Expection: ".$e->getCode().": ",$e->getMessage()."<br />".
            " in ".$e->getFile(). " on line ".$e->getLine(). "<br />";
        echo $e;                                         
    }
?>
<pre>
    <?php 
        var_dump($e);
    ?>
</pre>