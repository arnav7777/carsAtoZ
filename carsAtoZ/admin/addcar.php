<?php include ('../config.php');

if(isset($_SESSION['add']))
{
  echo $_SESSION['add'];
  unset ($_SESSION['add']);
}

$id=$_GET['id'];
?>

<head>
<title>carAtoZ | Add cars</title>
<link rel="stylesheet" href="../assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
    rel="stylesheet">
</head>

<header class="h2 section-title"> ADD CAR </header>
<div class="container">

<form action="" method="POST" enctype="multipart/form-data">
  <div class="input-wrapper">
    <label for="title" class="input-label"  >Vehicle Model:</label>
    <input type="text" class="input-field" id="Model" name="Model" placeholder="Enter Vehicle Model" required>
  </div>
  <div class="input-wrapper">
    <label for="description" class="input-label">Vehicle Number</label>
    <input class="input-field" id="VNumber" name="VNumber"  placeholder="Vehicle Number"></input>
 </div>
 <div class="input-wrapper">
    <label for="seat" class="input-label" >Seating capacity</label>
    <input type="number" class="input-field" id="seat" placeholder="Seating capacity" name="seat" required>
  </div>
  <div class="input-wrapper">
    <label for="Price" class="input-label" >Rent per day</label>
    <input type="number" class="input-field" id="price" placeholder="Rent per day" name="price" required>
  </div>
  <div class="input-wrapper">
    <label for="formFileMultiple" class="input-label"  >Image</label>
    <input type="file" class="input-field" id="formFileMultiple" name="image" multiple  >
  </div>
   
  <div class="input-wrapper">Engine: <br>
      <input type="radio" class=" m-1 p-1 form-check-input" id="featuredCheck1" name="engine" value="Petrol" required>
    <label for="featuredcheck1" class="form-check-label">Petrol</label>
    <input type="radio" class=" m-1 p-1 form-check-input" id="featuredCheck2" name="engine" value="Diesel" required>
    <label for="featuredcheck2" class="form-check-label">Diesel</label>
  </div>
  <div class="input-wrapper">Gear: <br>
      <input type="radio" class=" m-1 p-1 form-check-input" id="activeCheck1" name="Gear" value="Manual" required>
    <label for="activecheck1" class="form-check-label">Manual</label>
    <input type="radio" class=" m-1 p-1 form-check-input" id="activeCheck2"name="Gear" value="Automatic" required>
    <label for="activecheck2" class="form-check-label">Automatic</label>
   </div>
   <div class=" input-wrapper">
    <label for="Price" class="input-label" >Engine Specification</label>
    <input type="text" class="input-field" id="e_spec" placeholder="Engine Specification" name="e_spec" required>
  </div>

 
  <button type="submit" name="submit" class="btn btn-outline-danger">Add Car!</button>
</form>



<?php
//process the value from form and save it in database

if(isset($_POST['submit']))
{

  $Model=$_POST['Model'];
 $VNumber=$_POST['VNumber'];
 $price=$_POST['price'];
 $seat=$_POST['seat'];
 $status="rent";
 $e_spec=$_POST['e_spec'];

 if(isset($_FILES['image']['name']))
 {
  $image_name=$_FILES['image']['name'];
  $src=$_FILES['image']['tmp_name'];
  $dst="../assets/images/cars/".$image_name;
  $upload=move_uploaded_file($src,$dst);
 }

 else{
   $image_name="";
 
 }

 if(isset($_POST['engine']))
 {
   $engine=$_POST['engine'];
 
 }
 else{
   $engine="NA";
 
 }
 if(isset($_POST['Gear']))
 {
   $Gear=$_POST['Gear'];
 
 }
 else{
   $Gear="NA";
 
 }
 
$sql2 = "INSERT INTO vehicle SET
VehicleModel='$Model',
VehicleNumber='$VNumber',
RentPerDay=$price,
SeatingCapacity=$seat,
PhotoURL='$image_name',
status='$status',
Gear='$Gear',
e_spec='$e_spec',
engine='$engine',
agency_id=$id";
$result= mysqli_query($conn, $sql2);
 
if($result == true)
{

  $_SESSION['add'] ="<div class='alert alert-success'>SUCCESSFULLY ADDED ARTICLE!!</div>";
  header("Location:carpanel.php?id=$id");

  
  
}
else
{
  $_SESSION['add'] ="<div class='alert alert-danger'>UNSUCCESSFUL!!</div>";
 
  header("Location:addcar.php?id=$id");
}

}
?>

</div>