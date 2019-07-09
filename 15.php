<?php
    // require('15ex.php');
    // echo 'end of php';

    include('config/db_connect.php');
    $errors = array('name' => '', 'age' => '' );

    // check get request. The GET will be an array storing data to be transfered to server as GET. 
    // _ is global var. GET belows will take the value when the submit button pressed
    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['name']);      // Prevent XSS
        // echo htmlspecialchars($_POST['age']);
        errCheck();
        if(array_filter($errors)) {
            phpAlert($errors);      // array in the form
        } else{

                $name = mysqli_real_escape_string($qCon, $_POST['name']);
                $age = mysqli_real_escape_string($qCon, $_POST['age']);
                header('Location: index.php');
            }
    }

    function errCheck(){
        global $errors; // things outside of function is inaccessible, better use this or create new array then export it out
        if(empty($_POST['name'])) {$errors['name'] = 'Name can\'t be emty';}
        elseif(!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])){ $errors['name'] = 'Only letters available for name.';};
        if(empty($_POST['age'])) {$errors['age'] = 'Age can\'t be empty';} 
    }

    function phpAlert($msg){
        echo '<script type="text/javascript">alert("' . $msg['name'] . '. ' . $msg['age'] . '")</script>';
    };

?>

<!DOCTYPE html> 
<html>
    <head>
        <title> my PHP </title>
    </head>

    <body>
        <h4 class="center">Add a Person</h4>
        <form class="white" action="15.php" method="POST">           <!-- GET request form -->
            <label>Name: </label>
            <input type="text" name="name">                            <!-- name is the key for http request -->
            <label>Age: </label>
            <input type="number" name="age">
            <div class="center">
                <input type="submit" name="submit" value="submit">
            </div>
        </form>


    </body>
</html>

