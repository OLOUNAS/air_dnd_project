<?php
session_start();
include "header.php";
?>

<body>
  <div class="p-3 mb-2 bg-light text-dark text-center" style="margin-top: 1em;">
    <form action="searchresult.php" method="get" class="d-flex justify-content-center align-items-center flex-wrap">

      <input type="text" name="search" class="form-control text-center mr-2 mb-2" style="border-style:none;" placeholder="Research your next home">

      <div class="mb-3">
        <label for="start_date" class="form-label">Start Date:</label>
        <input type="date" id="start_date" name="start_date" class="form-control" required min="1000-01-01" max="9999-12-31" lang="en">
      </div>

      <div class="mb-3">
        <label for="end_date" class="form-label">End Date:</label>
        <input type="date" id="end_date" name="end_date" class="form-control" required min="1000-01-01" max="9999-12-31" lang="en">
      </div>

      <button type="submit" class="btn btn-light" style="margin-top: 1em;">Search</button>

    </form>
  </div>



  </div>

  <div class="p-3 mb-2 bg-light text-dark text-center" style=margin-top:1em;>
    <h1 class=display-4>Our guests favorites</h1>
  </div>

  <?php
  $pdo = new \PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');
  $query = "SELECT * FROM property";
  $statement = $pdo->query($query);
  $property = $statement->fetchAll();

  foreach ($property as $oneproperty) { ?>


    <html>
    <div class="row" style=margin-top:2em>
      <div class="col d-flex justify-content-center">
        <div class="card w-75 bg-light mb-3 border-light" style="height: 30rem;">
          <div class="card-body">
            <h5 class="card-title" style=text-align:center><?php echo $oneproperty['CommercialName'] . ", " . $oneproperty['City'] . ", " . $oneproperty['Country'] ?></h5>
            <div>
              <a href="http://localhost:8000/homedetail.php?id=<?php echo $oneproperty['id'] ?>"><img class="mx-auto d-block img-fluid" src=<?php echo $oneproperty['imageurl'] ?> alt="Studio picture"></a>
            </div>
            <p class="card-text" style=text-align:center><?php echo $oneproperty['Description'] . "<br>" . $oneproperty['PricePerNight'] . "AED/Night" . "<br>" ?><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg> </p>
            <div class="text-center">
              <a href="http://localhost:8000/homedetail.php?id=<?php echo $oneproperty['id'] ?>" class="btn" style=background-color:beige>More informations </a>
            </div>
          </div>
        </div>
      </div>

    </html>
  <?php } ?>
</body>

<?php
include "footer.php"
?>