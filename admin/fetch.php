<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM propertys ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE title LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR location LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR lotsize LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR garage LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR bedrooms LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR bathrooms LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR price LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR description LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $image = '';
 if($row["image"] != '')
 {
  $image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
 }
 else
 {
  $image = '';
 }
 $sub_array = array();
 $sub_array[] = $image;
 $sub_array[] = $row["title"];
 $sub_array[] = $row["location"];
 $sub_array[] = $row["lotsize"];
 $sub_array[] = $row["garage"];
 $sub_array[] = $row["bedrooms"];
 $sub_array[] = $row["bathrooms"];
 $sub_array[] = $row["price"];
 $sub_array[] = $row["description"];
 $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
 $data[] = $sub_array;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data
);
echo json_encode($output);
?>