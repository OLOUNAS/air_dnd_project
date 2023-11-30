<?php
include "header.php";
session_start();

?>


<?php
$today = date("Y-m-d");
$NbrOfNights = $_GET['date_difference'];
$Guests = $_GET['guests'];
$DateOfArrival = $_GET['startdate'];
$DateOfDeparture = $_GET['enddate'];
$Totalprice = $_GET['total_price'];
$id_user = $_GET['id_user'];
$propertyid = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');

$query = "INSERT INTO booking (BookingDate, NbrOfGuests, DateOfArrival, DateOfDeparture, NbrOfNights, TotalPrice, id_User, id_Property ) 
          VALUES(:today, :guests, :DateOfArrival, :DateOfDeparture, :NbrOfNights, :total_price, :id_user, :id)";
$statement = $pdo->prepare($query);
$statement->bindValue(':today', $today, PDO::PARAM_STR);
$statement->bindValue(':guests', $Guests, PDO::PARAM_STR);
$statement->bindValue(':DateOfArrival', $DateOfArrival, PDO::PARAM_STR);
$statement->bindValue(':DateOfDeparture', $DateOfDeparture, PDO::PARAM_STR);
$statement->bindValue(':NbrOfNights', $NbrOfNights, PDO::PARAM_STR);
$statement->bindValue(':total_price', $Totalprice, PDO::PARAM_STR);
$statement->bindValue(':id_user', $id_user, PDO::PARAM_STR);
$statement->bindValue(':id', $propertyid, PDO::PARAM_STR);
$statement->execute();


$query2 = "SELECT Firstname, Lastname, Mail, booking.id FROM user INNER JOIN booking ON user.id=booking.id_User WHERE user.id=:id_user";
$statement = $pdo->prepare($query2);
$statement->bindValue(':id_user', $id_user, PDO::PARAM_STR);
$statement->execute();
$values = $statement->fetch(PDO::FETCH_ASSOC);

?>
<html>
<div class="p-3 mb-2 bg-light text-dark text-center" style=margin-top:3em>
    <h4 class=display-4>Booking process step 2/2</h4>
    <h2 class=display-4 style=font-size:22px;> Your booking is confirmed</h2>
    <p> Congratulations <?php echo $values['Lastname'] . " " . $values['Firstname'] ?>! Your booking is confirmed.<br> You will receive a confirmation by email at <?php echo $values['Mail'] ?> in few minutes.</p>

</html>


<?php
include "footer.php"

?>