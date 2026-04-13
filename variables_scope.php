<?php
    echo"Variables and datatypes";
    echo "<br>";

    $name="Shekar";
    var_dump($name);

    echo "<br>";

    $age=19;
    var_dump($age);

    echo "<br>";

    $cgpa=9.56;
    var_dump($cgpa);

    echo "<br>";

    $status=true;
    var_dump($status);

    echo "<br>";

    echo" My name:$name <br> Age:{$age} <br> CGPA:{$cgpa} <br> Status:{$status} <br>";

    $subjects=array("WT","DSP","COA","CD");
    print_r($subjects);

    echo "<br>";

    //Global Scope
    $value=10;
    function results(){
        global $value;
        echo "Global value is:$value";
    }
    results();

    echo "<br>";

    //Local scope
    function inside(){
        $data=20;
        echo "local value is: $data";
    }
    inside();

    echo "<br>";

    //Static Scope
    function myTest() {
        static $x = 0;
        echo $x;
        $x++;
    }
    myTest();
    echo "<br>";
    myTest();
    echo "<br>";
    myTest();
?>
