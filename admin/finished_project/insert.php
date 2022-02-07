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
   INSERT INTO finished_project (floorarea, location, lotsize, image) 
   VALUES (:floorarea, :location, :lotsize, :image)
  ");
  $result = $statement->execute(
   array(
    ':floorarea' => $_POST["floorarea"],
    ':location' => $_POST["location"],
    ':lotsize' => $_POST["lotsize"],
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
   "UPDATE finished_project
   SET floorarea = :floorarea , location = :location , lotsize = :lotsize , image = :image  
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':floorarea' => $_POST["floorarea"],
    ':location' => $_POST["location"],
    ':lotsize' => $_POST["lotsize"],
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
   