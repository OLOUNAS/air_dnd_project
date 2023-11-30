<?php
include "header.php";
session_start();
?>


<html>
<div class="p-3 mb-2 bg-light text-dark text-center" style= margin-top:3em><h1 class=display-4>Find your next holiday home</h1> 
</div>
</html>

<?php
$pdo = new \PDO('mysql:host=localhost;dbname=air_dnd_project', 'root','');
$query = "SELECT * FROM property";
$statement = $pdo->query($query);
$property = $statement->fetchAll();

foreach($property as $oneproperty){ ?>


<html>
<div class="row" style= margin-top:5em>
<div class="row justify-content-center" >
  <div class="card w-75 bg-light mb-3 border-light" style="height: 30rem;" >
    <div class="card-body">
      <h5 class="card-title" style=text-align:center><?php echo $oneproperty['CommercialName'].", ".$oneproperty['City'].", ".$oneproperty['Country']?></h5>
      <div>
      <a href="http://localhost:8000/homedetail.php?id=<?php echo $oneproperty['id']?>"><img class="mx-auto d-block img-fluid" src=<?php echo $oneproperty['imageurl']?> alt="Studio picture"></a>
      </div>
      <p class="card-text" style=text-align:center><?php echo $oneproperty['Description']."<br>".$oneproperty['PricePerNight']."AED/Night"?></p>
      <div class="text-center">
          <a href="http://localhost:8000/homedetail.php?id=<?php echo $oneproperty['id']?>" class="btn"style=background-color:beige>More informations </a>
    </div>
    </div>
  </div>
</div>
</html>
<?php } ?>








<?php
include "footer.php"

?>

