<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM propertys 
  WHERE id = '".$_POST["user_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["title"] = $row["title"];
  $output["location"] = $row["location"];
  $output["lotsize"] = $row["lotsize"];
  $output["garage"] = $row["garage"];
  $output["bedrooms"] = $row["bedrooms"];
  $output["bathrooms"] = $row["bathrooms"];
  $output["price"] = $row["price"];
  $output["description"] = $row["description"];
  if($row["image"] != '')
  {
   $output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
  }
  else
  {
   $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
  }
 }
 echo json_encode($output);
}
?>
   