<?php
include "header.php";
session_start();
?>


<html>
<div class="p-3 mb-2 bg-light text-dark text-center" style=margin-top:3em>
  <h1 class=display-4>About this home</h1>
</div>

</html>
<?php
$id = $_GET['id'];
$pdo = new \PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');
$query = "SELECT * FROM property WHERE id=:myId";
$statement = $pdo->prepare($query);
$statement->bindValue(':myId', $id, \PDO::PARAM_INT);
$statement->execute();
$property = $statement->fetch(PDO::FETCH_ASSOC);


?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-3 text-center">
      <img src=<?php echo $property['imageurl'] ?> alt="Image 1" class="img-fluid">
    </div>
    <div class="col-md-6 col-lg-3 text-center">
      <img src=<?php echo $property['imageurl2'] ?> alt="Image 2" class="img-fluid">
    </div>
  </div>
  <div class="row mt-4 justify-content-center">
    <div class="col-md-6 col-lg-3 text-center">
      <img src=<?php echo $property['imageurl3'] ?> alt="Image 3" class="img-fluid">
    </div>
    <div class="col-md-6 col-lg-3 text-center">
      <img src=<?php echo $property['imageurl4'] ?> alt="Image 4" class="img-fluid">
    </div>
  </div>
</div>

<html>
<div class="p-3 mb-2 bg-light text-dark text-center" style=margin-top:3em>
  <h4 class=display-4>Description</h4>
</div>
<div class="p-3 mb-2 bg-light text-dark text-center">
  <p><?php echo $property['Description'] ?>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem molestiae nostrum consequuntur enim quam, voluptas expedita? Debitis, quaerat? Quidem doloremque eligendi cupiditate exercitationem rerum est adipisci necessitatibus deserunt! Sed, veniam.</p>
  <p><?php echo "Price/Night: " . $property['PricePerNight'] . " AED" ?></p>
</div>
<div class="p-3 mb-2 bg-light text-dark text-center" style=margin-top:3em>
  <h4 class=display-4>Book it!</h4>
</div>
<div class="p-3 mb-2 bg-light text-dark text-center d-flex justify-content-center align-items-center flex-wrap">
  <form action="http://localhost:8000/cart.php?id=<?php echo $property['id'] ?>" method="post" onsubmit="return validateForm()">
    <div class="mb-3">
      <label for="start_date" class="form-label">Start Date:</label>
      <input type="date" id="start_date" name="start_date" class="form-control" required min="1000-01-01" max="9999-12-31" lang="en">
    </div>

    <div class="mb-3">
      <label for="end_date" class="form-label">End Date:</label>
      <input type="date" id="end_date" name="end_date" class="form-control" required min="1000-01-01" max="9999-12-31" lang="en">
      <div id="dateError" class="text-danger"></div>
    </div>

    <div class="mb-3">
      <label for="num_persons" class="form-label">Number of Persons:</label>
      <select id="num_persons" name="num_persons" class="form-select" required>
        <?php
        $id = $_GET['id'];
        $pdo = new PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');
        $statement = $pdo->prepare($query);
        $statement->bindValue(':myId', $id, \PDO::PARAM_INT);
        $statement->execute();
        $capacity = $statement->fetch(PDO::FETCH_ASSOC);

        echo '<option value="' . $capacity['Capacity'] . '">' . $capacity['Capacity'] . " Guests maximum" . '</option>';

        ?>
      </select>
    </div>

    <button type="submit" class="btn" style="background-color: beige">Start booking process</button>

  </form>
</div>

<script>
  function validateForm() {
    var startDate = new Date(document.getElementById('start_date').value);
    var endDate = new Date(document.getElementById('end_date').value);
    var currentDate = new Date();

    if (startDate < currentDate) {
      document.getElementById('dateError').innerHTML = 'Start date must be today or later';
      return false;
    } else if (endDate < startDate) {
      document.getElementById('dateError').innerHTML = 'End date must be after start date';
      return false;
    } else {
      document.getElementById('dateError').innerHTML = '';
      return true;
    }
  }
</script>

</div>

</html>




<?php
include "footer.php"

?>