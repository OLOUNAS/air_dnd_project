<?php
include "header.php";
session_start();
?>



<?php
$username = $_SESSION['username'];
$pdo = new PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');
$query = "SELECT id FROM user WHERE Login = :username";
$statement = $pdo->prepare($query);
$statement->bindValue(':username', $username, PDO::PARAM_STR);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);


$query2 = "SELECT Firstname, Lastname, Mail FROM user WHERE id = :id_user";
$statement = $pdo->prepare($query2);
$statement->bindValue(':id_user', $user['id'], PDO::PARAM_INT);
$statement->execute();
$values = $statement->fetch(PDO::FETCH_ASSOC);


?>


<html>
<div class="p-3 mb-2 bg-light text-dark text-center" style=margin-top:3em>
    <h1 class=display-4>Your personnal informations</h1>
    <p>Lastname: <?php echo $values['Lastname'] ?></p>
    <p>Firstname: <?php echo $values['Firstname'] ?></p>
    <p>Mail: <?php echo $values['Mail'] ?></p>
</div>

</html>





<?php
include "footer.php"
?>