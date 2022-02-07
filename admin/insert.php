<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  $statement = $connection->prepare("
   INSERT INTO propertys (title, location, lotsize, garage, bedrooms, bathrooms, price,  description, image) 
   VALUES (:title, :location, :lotsize, :garage, :bedrooms, :bathrooms, :price, :description, :image)
  ");
  $result = $statement->execute(
   array(
    ':title' => $_POST["title"],
    ':location' => $_POST["location"],
    ':lotsize' => $_POST["lotsize"],
    ':garage' => $_POST["garage"],
    ':bedrooms' => $_POST["bedrooms"],
    ':bathrooms' => $_POST["bathrooms"],
    ':price' => $_POST["price"],
    ':description' => $_POST["description"],
    ':image'  => $image
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 if($_POST["operation"] == "Update")
 {
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_user_image"];
  }
  $statement = $connection->prepare(
   "UPDATE propertys
   SET title = :title , location = :location , lotsize = :lotsize , garage = :garage , bedrooms = :bedrooms , bathrooms = :bathrooms , price = :price , description = :description, image = :image  
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':title' => $_POST["title"],
    ':location' => $_POST["location"],
    ':lotsize' => $_POST["lotsize"],
    ':garage' => $_POST["garage"],
    ':bedrooms' => $_POST["bedrooms"],
    ':bathrooms' => $_POST["bathrooms"],
    ':price' => $_POST["price"],
    ':description' => $_POST["description"],
    ':image'  => $image,
    ':id'   => $_POST["user_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
   