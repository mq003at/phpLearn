<?php 
    // make a connection to the db. 
    include('config/db_connect.php');
    
    // write queries
    $sql = 'SELECT id, lname, age  FROM person ORDER BY created_at';

    // geto the queries result. It will  become an object of class mysqli_result
    $result = mysqli_query($qCon, $sql);

    // convert result to array
    $people = mysqli_fetch_all($result, MYSQLI_ASSOC);
    print_r($people);
    mysqli_free_result($result);
?>

<!DOCTYPE html>
<html>
    <div class="row">
        <?php foreach($people as $person) {
            ?><h4><?php echo 'Name: ' . $person['lname'] . '. Age: ' . $person['age']; 
            ?><div> <h3><a href="25ex.php?id=<?php echo $person['id']?>">more info</a> </div>                        <!-- A link create by using php echo to add variables -->
            <?php
        }?>
    </div>
</html>