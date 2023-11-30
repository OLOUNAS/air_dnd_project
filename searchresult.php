<?php
session_start();
include "header.php";
?>


<?php
 $pdo = new \PDO('mysql:host=localhost;dbname=air_dnd_project', 'root', '');
 $query = "SELECT * FROM property";
if(isset($_GET['search']) AND !empty($_GET['search'])) {
$research = htmlspecialchars($_GET['search']);
$allproperties = $pdo->query($query);
$query= "SELECT CommercialName, Country, City FROM property WHERE CommercialName LIKE '%$research%' OR Country LIKE '%$research%' OR City LIKE '%$research%'";;
}

 ?>
 <?php 
    if($allproperties->rowCount() > 0) { 
        while($property = $allproperties->fetch()){
         ?>
       <html>
<div class="row" style= margin-top:5em>
<div class="row justify-content-center" >
  <div class="card w-75 bg-light mb-3 border-light" style="height: 30rem;" >
    <div class="card-body">
      <h5 class="card-title" style=text-align:center><?php echo $property['CommercialName'].", ".$property['City'].", ".$property['Country']?></h5>
      <div>
      <a href="http://localhost:8000/homedetail.php?id=<?php echo $property['id']?>"><img class="mx-auto d-block img-fluid" src=<?php echo $property['imageurl']?> alt="Studio picture"></a>
      </div>
      <p class="card-text" style=text-align:center><?php echo $oproperty['Description']."<br>".$property['PricePerNight']."AED/Night"?></p>
      <div class="text-center">
          <a href="http://localhost:8000/homedetail.php?id=<?php echo $property['id']?>" class="btn"style=background-color:beige>More informations </a>
    </div>
    </div>
  </div>
</div>
</html>
    
         <?php
    }
   ?>









<?php
include "footer.php"
?>

