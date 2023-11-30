<?php
include "header.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<html>

<div class="p-3 mb-2 bg-light text-dark text-center" style=margin-top:3em>
    <h4 class=display-4>Booking process step 1/2</h4>
    <h2 class=display-4 style=font-size:22px;> Confirm your booking détails</h2>
    <?php
    $id = $_GET['id'];
    $pdo = new \PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');
    $query = "SELECT * FROM property WHERE id=:myId";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':myId', $id, \PDO::PARAM_INT);
    $statement->execute();
    $property = $statement->fetch(PDO::FETCH_ASSOC);


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $startdate = isset($_POST['start_date']) ? $_POST['start_date'] : '';
        $enddate = isset($_POST['end_date']) ? $_POST['end_date'] : '';
        $guests = isset($_POST['num_persons']) ? $_POST['num_persons'] : '';

        function calculateDateDifference($start_date, $end_date)
        {
            // Convertir les dates en objets DateTime
            $start_date = new DateTime($start_date);
            $end_date = new DateTime($end_date);
            // Calculer la différence en jours
            $date_difference = $start_date->diff($end_date);
            // Renvoyer le nombre de jours
            return $date_difference->days;
        }
        $date_difference = calculateDateDifference($startdate, $enddate);

        function calculatetotalprice($PricePerNight, $date_difference)
        {


            return $PricePerNight * $date_difference;
        }
        $totalPrice = calculatetotalprice($property['PricePerNight'], $date_difference);

        $username = $_SESSION['username'];
        $pdo = new PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');

        
        $query = "SELECT id FROM user WHERE Login = '$username'";
        $statement = $pdo->query($query);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    }





    
    echo "Date of arrival : $startdate <br>";
    echo "Departure date : $enddate <br>";
    echo "Number of guests : $guests maximum<br>";
    echo "Number of nights : $date_difference nights<br>";
    echo "Price per night : $property[PricePerNight] AED<br>";
    echo "Total price: $totalPrice AED";


    ?>

    <div class="text-center">
        <a href="http://localhost:8000/bookingconfirmation.php?id=<?php echo $property['id'] ?>&startdate=<?php echo $startdate ?>&enddate=<?php echo $enddate ?>&guests=<?php echo $guests ?>&date_difference=<?php echo $date_difference ?>&total_price=<?php echo $totalPrice ?>&id_user=<?php echo $user['id'] ?>" class="btn" style="background-color: beige;">Confirm your booking</a>
    </div>



</html>






<?php
include "footer.php"

?>