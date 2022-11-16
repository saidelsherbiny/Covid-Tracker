<?php require_once 'database.php';
$statement = $conn->prepare('Select * FROM wuc353_1.User as users');
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><table>
<thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>last name</td>
            <td>citizenship</td>
        </tr>
    </thead>
    <tbody>

    <?php
     while ($row = $statement->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT)){?>
                <tr>
                <td><?=$row['U_ID']?></td>
                <td><?=$row['firstName']?></td>
                <td><?=$row['lastName']?></td>
                <td><?=$row['phoneNumber']?></td>
                <td><?=$row['email']?></td>

                </tr>
                     <?php } ?>
    </tbody>
</table>
    
</body>
</html>
