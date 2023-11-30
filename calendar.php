<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Form</title>
  <!-- Ajoutez le lien vers le fichier Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.3/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<div class="container mt-5">
  <h2>Booking Form</h2>
  <form action="process_booking.php" method="post" onsubmit="return validateForm()">
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
          // Code PHP pour récupérer le nombre de personnes depuis la base de données
          $pdo = new PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');
          $query = "SELECT DISTINCT Capacity FROM property";
          $statement = $pdo->query($query);
          while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $row['Capacity'] . '">' . $row['Capacity'] ." Guests maximum". '</option>';
          }
        ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit Booking</button>
  </form>
</div>

<script>
  function validateForm() {
    var startDate = new Date(document.getElementById('start_date').value);
    var endDate = new Date(document.getElementById('end_date').value);

    if (endDate < startDate) {
      document.getElementById('dateError').innerHTML = 'End date must be after start date';
      return false;
    } else {
      document.getElementById('dateError').innerHTML = '';
      return true;
    }
  }
</script>

</body>
</html>
