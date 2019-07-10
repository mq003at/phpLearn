<?php
    // check GET request id param
   include('config/db_connect.php') ;

   // delete request
   if(isset($_POST['delete_btn'])):
        $delete_id = mysqli_real_escape_string($qCon, $_POST['delete_id']);
        $sql = "DELETE FROM person WHERE id = $delete_id";                  // no * since we delete the whole document
        if(mysqli_query($qCon, $sql)):
        //success
        header('Location: 25.php');
        else: echo 'Query error: ' . mysqli_error($qCon);
        endif;
    endif;

   // get request from param id
   if(isset($_GET['id'])):
       // security sql retrieve
       $id = mysqli_real_escape_string($qCon, $_GET['id']);

       // make sql
       $sql = "SELECT * FROM person WHERE id = $id";

       // get the query result
       $result = mysqli_query($qCon, $sql);

       // fetch result into array format
       $person = mysqli_fetch_assoc($result);
       print_r($person);
    
       // exit the memory
       mysqli_free_result($result);
       mysqli_close($qCon);
    endif;

?>

<!DOCTYPE html>
<html>
    <div>
        <?php if($person): ?> <!-- Alternate if syntax, more convinient than {} -->
        <h4>Identify Document: <?php echo htmlspecialchars($person['ID']); ?></h4>
        <p>Last name: <?php echo htmlspecialchars($person['lname']); ?></p>
        <p>Age: <?php echo htmlspecialchars($person['age']); ?></p>
        <p>Date created: <?php echo date($person['created_at']); ?></p>

        <!-- DELETE FORM -->
        <form action="25ex.php" method="POST">
            <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($person['ID']) ?>">
            <input type="submit" name="delete_btn" value="DELETE">
        </form>
        <?php else: ?>
        <h4> No person exists in the database </h4>
        <?php endif; ?> 
    </div>
</html>