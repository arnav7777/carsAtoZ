<?php include ('../config.php'); 
$admin_id=$_GET['aid'];?>
<?php

if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $sql2="SELECT * FROM vehicle WHERE VehicleID=$id";
  $res2=mysqli_query($conn,$sql2);
  $row2=mysqli_fetch_assoc($res2);

  $VehicleModel=$row2['VehicleModel'];
  $VehicleNumber=$row2['VehicleNumber'];
  $SeatingCapacity=$row2['SeatingCapacity'];
  $RentPerDay=$row2['RentPerDay'];
  $engine=$row2['engine'];
  $e_spec=$row2['e_spec'];
  $gear=$row2['gear'];
  $PhotoURL=$row2['PhotoURL'];
  $status=$row2['status'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>CarsAtoZ | Update Car details</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">
  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
    rel="stylesheet">
</head>

<header class=" fw-light bg-light text-center fs-2 p-2"> Update Car details </header>
<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
    <label for="title" class="form-label"  >Vehicle Model:</label>
    <input type="text" class="form-control" id="Model" name="Model" value="<?php echo $VehicleModel;?>" required>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Vehicle Number</label>
    <input class="form-control" id="VNumber" name="VNumber"  value="<?php echo $VehicleNumber;?>"></input>
 </div>
 <div class=" mb-3">
    <label for="seat" class="form-label" >Seating capacity</label>
    <input type="number" class="form-control" id="seat" value="<?php echo $SeatingCapacity;?>" name="seat" required>
  </div>
  <div class=" mb-3">
    <label for="Price" class="form-label" >Rent per day</label>
    <input type="number" class="form-control" id="price" value="<?php echo $RentPerDay;?>" name="price" required>
  </div>
 
  <div class="mb-3 ">Engine: <br>
      <input <?php if($engine=="Petrol"){echo "checked";}?> type="radio" class=" m-1 p-1 form-check-input" id="featuredCheck1" name="engine" value="Petrol" required>
    <label for="featuredcheck1" class="form-check-label">Petrol</label>
    <input <?php if($engine=="Diesel"){echo "checked";}?> type="radio" class=" m-1 p-1 form-check-input" id="featuredCheck2" name="engine" value="Diesel" required>
    <label for="featuredcheck2" class="form-check-label">Diesel</label>
  </div>
  <div class="mb-3 ">Gear: <br>
      <input <?php if($gear=="Manual"){echo "checked";}?> type="radio" class=" m-1 p-1 form-check-input" id="activeCheck1" name="gear" value="Manual" required>
    <label for="activecheck1" class="form-check-label">Manual</label>
    <input <?php if($gear=="Automatic"){echo "checked";}?> type="radio" class=" m-1 p-1 form-check-input" id="activeCheck2"name="gear" value="Automatic" required>
    <label for="activecheck2" class="form-check-label">Automatic</label>
   </div>
   <div class=" mb-3">
    <label for="Price" class="form-label" >Engine Specification</label>
    <input type="text" class="form-control" id="e_spec" value="<?php echo $e_spec;?>" name="e_spec" required>
  </div>

  <div class="mb-3">
    <label for="formFileMultiple" class="form-label"  > Current Image : </label><br>
    <?php
    if($PhotoURL=="")
    {
      echo"<div class='text-muted'>No Image</div>";
    }
    else{
      ?>
      <img src="http://localhost/carsAtoZ/assets/images/cars/<?php echo $PhotoURL ;?>" width="150px">  </div><?php
    }
    ?>
   
  <div class="mb-3">
    <label for="formFileMultiple" class="form-label"  > New Image</label>
    <input type="file" class="form-control" id="formFileMultiple" name="image" multiple  >
  </div>   
   <input type="hidden" name="id" value="<?php echo $id?>" >
   <input type="hidden" name="current_image" value="<?php echo $PhotoURL?>" >
  <button type="submit" name="submit" class="btn btn-outline-danger">Update Car Details!</button>
</form>
  </header>
  </html>



<?php
//process the value from form and save it in database

if(isset($_POST['submit']))
{

  $Model=$_POST['Model'];
 $VNumber=$_POST['VNumber'];
 $price=$_POST['price'];
 $seat=$_POST['seat'];
 $e_spec=$_POST['e_spec'];
 $gear=$_POST['gear'];
 

 if(isset($_FILES['image']['name']))
 {
   $image_name=$_FILES['image']['name'];

  if($image_name!="")
   {
     $src=$_FILES['image']['tmp_name'];
     $dst="../assets/images/cars/".$image_name;
     $upload=move_uploaded_file($src,$dst);
   
   if($PhotoURL!="")
   {
    $remove_path="../assets/images/cars/".$PhotoURL;
    $remove=unlink($remove_path);
   }
  }
  else{
    $image_name=$PhotoURL;
  
  }
 }

 else{
   $image_name=$PhotoURL;
 
 }

$sql3 = "UPDATE  vehicle SET
VehicleModel='$Model',
VehicleNumber='$VNumber',
RentPerDay=$price,
SeatingCapacity=$seat,
PhotoURL='$image_name',
status='$status',
gear='$gear',
e_spec='$e_spec',
engine='$engine' WHERE  VehicleID=$id";


$result1= mysqli_query($conn, $sql3);

 
if($result1 == true)
{

  $_SESSION['add'] ="<div class='alert alert-success'>SUCCESSFULLY UPDATED ARTICLE!!</div>";
  header("Location:carpanel.php?id=$admin_id");

  
  
}
else
{
  $_SESSION['add'] ="<div class='alert alert-danger'>UNSUCCESSFUL!!</div>";
 
  header("Location:editcar.php?id=$admin_id");
}

}
?>

</div>