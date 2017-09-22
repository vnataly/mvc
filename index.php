<?php
 $start = microtime(true);  
    include_once("core/Route.php");
    $a = new Route();
    $a->run();
    echo "time: ".(microtime(true) - $start);
?>