<?php 
    // multidementional array
    // $list0 = [
    //     ['Quan', 'Jyri', 'Jani'],
    //     [10, 20, 'uncountable']
    // ];

    // print_r($list0);
    // print_r($list0[1][1]);
    // echo '<br /><br />';

    // Allias + m.array + foreach
    $list = [
        ['name' => 'Quan', 'age' => '20'],
        ['name' => 'Jyri', 'age' => '30']
    ];

    // foreach($list as $list) {
    //     echo $list['name'] . ' = ' . $list['age'];
    //     echo '<br />';
    // };

    $i = 0;
    while($i < count($list)) {
        echo $list[$i]['name'] . ' = ' . $list[$i]['age'];
        echo '<br />';
        $i++;
    }

    // Function
    function sayName($name = 'John') {
        echo "Good morning, $name.";
    }

?>

<!DOCTYPE html> 
<html>
    <head>
        <title> my PHP </title>
    </head>

    <body>  
        <!-- foreach requires creating new variables. DONT USE THE SAME VAR -->
        <?php foreach($list as $newList) { ?>
            <h4><?php echo $newList['name']; ?></h4>
            <p><?php echo $newList['age']; ?></p>
        <?php } ?>

        <?php sayName($list[0]['name']) ?>    </body>
</html>