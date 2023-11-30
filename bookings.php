<?php
include "header.php";
session_start();
?>

<div class="p-3 mb-2 bg-light text-dark text-center" style=margin-top:3em>
    <h1 class=display-4>Your previous bookings</h1>
</div>
<?php
$username = $_SESSION['username'];
$pdo = new PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');
$query = "SELECT id FROM user WHERE Login = :username";
$statement = $pdo->prepare($query);
$statement->bindValue(':username', $username, PDO::PARAM_STR);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);


$query2 = "SELECT BookingDate,NbrOfGuests, booking.id, DateOfArrival, DateOfDeparture, NbrOfNights,TotalPrice, Country, City, CommercialName FROM booking INNER JOIN user ON booking.id_User=user.id INNER JOIN property on booking.id_Property=property.id WHERE user.id = :id_user";
$statement = $pdo->prepare($query2);
$statement->bindValue(':id_user', $user['id'], PDO::PARAM_INT);
$statement->execute();
$bookings = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($bookings as $booking) { ?>

    <html>
    <div class="p-3 mb-2 bg-light text-dark text-center" style=margin-top:3em>
        <p>Booking reference: <?php echo $booking['id'] ?></p>
        <p>Booking date: <?php echo $booking['BookingDate'] ?></p>
        <p>Date of arrival: <?php echo $booking['DateOfArrival'] ?></p>
        <p>Number of nights: <?php echo $booking['NbrOfNights'] ?></p>
        <p>Total price: <?php echo $booking['TotalPrice'] . " AED" ?></p>
        <p>City and country: <?php echo $booking['City'] . ", " . $booking['Country'] ?></p>
        <p>Description: <?php echo $booking['CommercialName'] ?></p>
    </div>

    </html>

<?php } ?>






<?php
include "footer.php"
?>