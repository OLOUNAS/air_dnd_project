<?php
session_start();
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css
/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/423a5a11e0.js" crossorigin="anonymous"></script>
  <title>Air DnD- Holidays home</title>
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar sticky-top">
  <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-houses" viewBox="0 0 16 16">
    <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z" />
  </svg>
  <div class="container-fluid">
    <a class="navbar-brand" style=font-size:x-large; href="http://localhost:8000/index.php">Air DnD- Holidays home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>

    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" style=margin-left:2em; href="http://localhost:8000/index.php"> -Home- </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" style=margin-left:2em; href="http://localhost:8000/bookingpage.php"> -Find your next home- </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" style=margin-left:2em; href="#"> -Air DnD your home- </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" style=margin-left:2em; href="http://localhost:8000/aboutus.php">-About Us- </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" style=margin-left:2em; href="#"> -Contact Us- </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" style=margin-left:2em; href="http://localhost:8000/login.php"> - <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
            </svg> -Login/Sign-up- </a>
      </ul>
    </div>
  </div>
</nav>
<?php if (isset($_SESSION['username'])) {
  echo "Welcome " . $_SESSION['username'] . "<br/>";
  echo "<div style='text-align: right;'>
  <a href='http://localhost:8000/logout.php' class='btn' style='background-color: beige;'>Logout</a>
</div>";
  echo  "<a href='http://localhost:8000/personnal.php' class='btn'style=background-color:beige>Personnal informations</a>";
  echo "<a href='http://localhost:8000/bookings.php' class='btn'style=background-color:beige;margin-left:1em;>My bookings</a>";
} ?>