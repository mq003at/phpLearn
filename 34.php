<?php
    $score = 50;

    // if($score>40): echo 'High score!';
    // else: echo 'Low score';
    // endif;

    // $val = $score > 40 ? 'High score' : 'Low score';    // ternary operator, check if score > 40, then return value depending on result
    // echo $val;

    // echo $_SERVER['SERVER_NAME'];

    if(isset($_POST['submit_btn'])): 
        session_start();
        $_SESSION['alias'] = $_POST['alias'];
        echo 'Hello, ' . $_SESSION['alias'] . '.';
    endif;


?>

<!DOCTYPE html>
<html>
    <body>
        <!-- <p><?php echo $score > 40 ? 'High score' : 'Low score'; ?></p> -->

        <form action="index.php" method="POST">
            <label>What should we call you? </label>
            <input type="text" name="alias">
            <input type="submit" name="submit_btn" value="Submit">
        </form>

    </body>
</html>