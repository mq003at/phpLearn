<?php
    // require('15ex.php');
    // echo 'end of php';

    include('config/db_connect.php');
    $errors = array('lname' => '', 'age' => '', 'sql' => '' );

    // check get request. The GET will be an array storing data to be transfered to server as GET. 
    // _ is global var. GET belows will take the value when the submit button pressed
    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['lname']);      // Prevent XSS
        // echo htmlspecialchars($_POST['age']);
        errCheck();
        if(array_filter($errors)) {
            phpAlert($errors);      // array in the form
        } else{
                // security sql query
                $lname = mysqli_real_escape_string($qCon, $_POST['lname']);
                $age = mysqli_real_escape_string($qCon, $_POST['age']);
                header('Location: index.php');

                // create sql query
                $sql = "INSERT INTO person(lname, age) VALUES ('$lname', '$age')";

                // save db and check 
                if(mysqli_query($qCon, $sql)) {
                    // success
                    header('Location: 25.php');
                } else {
                    $errors['sql'] = 'Query error: '. mysqli_error($qCon);
                    phpAlert($errors);
                }
            }
    }

    function errCheck(){
        global $errors; // things outside of function is inaccessible, better use this or create new array then export it out
        if(empty($_POST['lname'])) {$errors['lname'] = 'Name field can\'t be emty';}
        elseif(!preg_match('/^[a-zA-Z\s]+$/', $_POST['lname'])){ $errors['lname'] = 'Only letters available for Name field.';};
        if(empty($_POST['age'])) {$errors['age'] = 'Age can\'t be empty';} 
    }

    function phpAlert($msg){                                                                                                // 
        // echo '<script type="text/javascript">alert("' . $msg['lname'] . '. ' . $msg['age'] . '")</script>';
        $message = '';
        foreach ($msg as $errors) {
            $message = $message.$errors;
            if ($errors != null) {
                $message = $message.'. ';
            }
        }
        echo '<script type="text/javascript">alert("' .$message. '")</script>';
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
            <input type="text" name="lname">                            <!-- name is the key for http request -->
            <label>Age: </label>
            <input type="number" name="age">
            <div class="center">
                <input type="submit" name="submit" value="submit">
            </div>
        </form>


    </body>
</html>

