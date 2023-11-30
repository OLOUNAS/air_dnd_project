<?php
include "header.php";
session_start();

// Fonction pour échapper les chaînes et prévenir les injections SQL
function sanitize($input)
{
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et échapper les informations du formulaire
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');

    // Préparer la requête SQL en utilisant des placeholders pour éviter les injections SQL
    $query = "SELECT * FROM user WHERE Login = :username AND Password = :password";
    $statement = $pdo->prepare($query);

    // Liaison des paramètres
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);

    // Exécution de la requête
    $statement->execute();

    // Vérification des informations d'identification
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        // Les informations d'identification sont correctes, lancer la session
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['Login'];

        // Récupérer le champ 'id' correspondant à l'utilisateur connecté
        $userId = $row['id'];

        // Ajouter l'ID à la variable de session
        $_SESSION['id'] = $userId;





        // Redirection vers la page de bienvenue
        header("Location: index.php");
        exit();
    } else {
        // Les informations d'identification sont incorrectes, afficher un message d'erreur
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="p-3 mb-2 bg-light text-dark text-center" style="margin-top: 3em;">
            <h4 class="display-4">Login/Sign-up</h4>
            <p>Already have an Air DnD account? Just login</p>

            <form action="login.php" method="post" style="margin-top: 3em;">
                <div>
                    <label for="Username">Username :</label>
                    <input type="text" id="Username" name="username" style="border-style: none;" required><br>

                    <label for="Password">Password :</label>
                    <input type="password" id="Password" name="password" style="margin-top: 3em; border-style: none;" required><br>


                </div>

                <button type="submit" class="btn" style="background-color: beige;margin-top: 1em;margin-bottom: 1em;">Login</button>
            </form>

            <?php
            // Afficher le message d'erreur le cas échéant
            if (isset($error_message)) {
                echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
            }
            ?>

            <p>Still don't have an Air DnD account? Just sign-up here!</p>
            <a href="http://localhost:8000/signup.php" class="btn" style="background-color: beige;">Sign-up</a>
        </div>
    </div>

</body>

</html>

<?php
include "footer.php";
?>