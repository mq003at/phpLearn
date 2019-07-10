
<?php
// index.php
    // put some text to the HTML
    // echo 'Hello World!'; // this is simple <p> in HTML
    define('NAME', 'Yoshi ');
    $age = "30 ";
    $manyPeople = ['Quan', 'James'];
    // print_r($manyPeople); // print the whole array with their indexes

    //assiative arrays, making an array become allias to another array.
    $manyPeople = ['Quan' => 'student', 'James' => 'visitor'];
    echo $manyPeople['Quan']; 

    
?>

<!DOCTYPE html> 
<html>
    <head>
        <title> my PHP </title>
    </head>

    <body>

        <!-- <div><?php echo NAME.$age.$manyPeople[1] ?></div>  // join 2 strings 2gether -->
    </body>
</html>