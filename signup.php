<?php
include "header.php"
?>


<html>
<div class="p-3 mb-2 bg-light text-dark text-center" style=margin-top:3em>
    <h4 class=display-4>Sign-Up</h4>

    <form action="signup.php" method="post" style=margin-top:3em>
        <div>
            <label for="login">Username :</label>
            <input type="text" id="Username" name="username" style=border-style:none><br>
            <label for="Password">Password :</label>
            <input type="text" id="Password" name="password" style=margin-top:1em;border-style:none><br>
            <label for="Mail">Mail :</label>
            <input type="text" id="Mail" name="mail" style=margin-top:1em;border-style:none><br>
            <label for="firstname">Firstname :</label>
            <input type="text" id="Firstname" name="firstname" style=margin-top:1em;border-style:none><br>
            <label for="lastname">Lastname :</label>
            <input type="text" id="lastname" name="lastname" style=margin-top:1em;border-style:none><br>
        </div>
        <button href="http://localhost:8000/signup.php type=" submit" class="btn" style=background-color:beige;margin-top:1em>Submit</button><br>


        <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        $mail = $_POST['mail'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];


        $pdo = new PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');

        $query = "INSERT INTO user (Login, Password, Lastname, Firstname, Mail) VALUES(:username, :password, :lastname, :firstname, :mail)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':username', $username, \PDO::PARAM_STR);
        $statement->bindValue(':mail', $mail, \PDO::PARAM_STR);
        $statement->bindValue(':password', $password, \PDO::PARAM_STR);
        $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
        $statement->execute();

        echo "Congratulations, Your account has been created! Just login now!";


        ?>

    </form>
</div>

</html>


<?php
include "footer.php"

?>