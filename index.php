<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// $stmt = $pdo->prepare("SELECT * FROM clothinglines WHERE ClothingLineID = 1");

        //if ($stmt->execute()) {
            //echo "<pre>";
            //print_r($stmt->fetch());
            //echo "</pre>";
            //}
    $stmt = $pdo->prepare("SELECT * FROM friends WHERE friendsID = ");

        if ($stmt->execute()) {
            echo "<pre>";
            print_r($stmt->fetch());
            echo "</pre>";
            }
        
    $query = "INSERT INTO friends (FriendID , FriendWhoAdded , FriendBeingAdded, IsAccepted, DateAdded) values(?,?,?,?,?)";

    $stmt = $pdo->prepare($query);

$executeQuery = $stmt->execute(
        [11,"Nikko",'Daquiuagfriends']
   );

    if ($executeQuery) {
        echo "Query successful!";
    }
    else {
        echo "Query failed";
    }

    $query = "DELETE FROM friends
    		  WHERE FriendID = 11 ";
    
     $stmt = $pdo->prepare($query);
    
     $executeQuery = $stmt->execute();
    
    /if ($executeQuery) {
        echo "Deletion successful!";
     }
     else {
        echo "Query failed";
    }




    $query = "UPDATE users 
            SET Username = ?
    		  WHERE UserID = 1";
    
    $stmt = $pdo->prepare($query);

     $executeQuery = $stmt->execute(
     ["Apple"] );

     if ($executeQuery) {
     echo "Update successful!";
    }
     else {
     echo "Query failed";
     }


     $query = "SELECT * FROM users";

    $stmt = $pdo->prepare($query);
	     $executeQuery = $stmt->execute();

	     if ($executeQuery) {
	 	$users= $stmt->fetchAll();
	}

	 else {
 	echo "Query failed";
    }
?>



    <table>
    <tr>
			<th>UserID</th>
			<th>Username</th>
            <th>FirstName </th>
            <th>LastName </th>
            <th>DateOfBirth </th>
            <th>Password </th>
            <th>DateAdded </th>

		</tr>

        <?php foreach ($users as $row) { ?>
        <tr>
            <td><?php echo $row['UserID']; ?></td>
            <td><?php echo $row['Username']; ?></td>
            <td><?php echo $row['FirstName']; ?></td>
            <td><?php echo $row['LastName']; ?></td>
            <td><?php echo $row['DateOfBirth']; ?></td>
            <td><?php echo $row['Password']; ?></td>
            <td><?php echo $row['DateAdded']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>