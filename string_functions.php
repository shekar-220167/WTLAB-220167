<?php

    $college = "RGUKT";
    $course = "B.Tech CSE";

    echo "College: $college <br>";
    echo "Course: $course <br>";

    echo"String functions";
    $aizen="Yokoso Watashino Soul Society";
    $ichigo="Getsuga Tenshou";
    //Basic string functions
    echo "<br> length of the string:".strlen($aizen);
    echo "<br> word count of the string:".str_word_count($aizen);
    echo "<br> reverse of the string:".strrev($aizen);

    //Case conversion
    echo "<br> Uppercase:".strtoupper($aizen);
    echo "<br> Lowercase:".strtolower($aizen);
    echo "<br> First letter uppercase:".ucfirst($aizen);
    echo "<br> First letter of each word uppercase:".ucwords($aizen);

    //Search and replace
    echo "<br> position of the string:".strpos($aizen,"Soul");
    echo "<br> replace of the string:".str_replace("Soul","World",$aizen);

    //Substring and Trimming
    echo "<br> substring of the string:".substr($aizen,16,20);
    echo "<br> Trimming of the string:".trim($aizen);
    echo "<br> Left trimming of the string:".ltrim($aizen);
    echo "<br> Right trimming of the string:".rtrim($aizen);

    //String Comparison
    echo "<br> String comparison:".strcmp($aizen,$ichigo);
    echo "<br> String case comparison:".strcasecmp($aizen,$ichigo);
    
    //Special characters and Security
    echo "<br> ".htmlspecialchars("<a href='login.php'>Click here</a>");
    echo "<br> ".addlashes("Shekar's book");

?>