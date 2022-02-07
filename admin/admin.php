<html>
	<head>
		<title>Welcome to Admin Panel</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Sofia Properties</h1>
				<a href="#">Listing</a>
				<a href="finished_project/">Finished Project</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="container box">
			<h1 align="center">Welcome to Admin Panel</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Properties</button>
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Image</th>
							<th width="35%">Title</th>
							<th width="10%">Location</th>
							<th width="10%">Lotsize</th>
							<th width="10%">Garage</th>
							<th width="10%">Bedrooms</th>
							<th width="10%">Bathrooms</th>
							<th width="10%">Price</th>
							<th width="35%">Description</th>
							<th width="10%">Update</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Properties</h4>
				</div>
				<div class="modal-body">
					<label>Enter Title</label>
					<input type="text" name="title" id="title" class="form-control" placeholder="Title" />
					<br />
					<label>Enter Location</label>
					<input type="text" name="location" id="location" class="form-control" placeholder="Location" />
					<br />
					<label>Enter Lotsize</label>
					<input type="text" name="lotsize" id="lotsize" class="form-control" placeholder="Lotsize" />
					<br />
					<label>Enter Garage</label>
					<input type="text" name="garage" id="garage" class="form-control" placeholder="Garage" />
					<br />
					<label>Enter Bedrooms</label>
					<input type="text" name="bedrooms" id="bedrooms" class="form-control" placeholder="Bedrooms" />
					<br />
					<label>Enter Bathrooms</label>
					<input type="text" name="bathrooms" id="bathrooms" class="form-control" placeholder="Bathrooms" />
					<br />
					<label>Enter Price</label>
					<input type="text" name="price" id="price" class="form-control" placeholder="Price" />
					<br />
					<label>Enter Description</label>
					<textarea rows="6" name="description" id="description" class="form-control" placeholder="Description"></textarea>
					<br />
					<label>Select Image</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var title = $('#title').val();
		var location = $('#location').val();
		var lotsize= $('#lotsize').val();
		var garage= $('#garage').val();
		var bedrooms= $('#bedrooms').val();
		var bathrooms= $('#bathrooms').val();
		var price = $('#price').val();
		var description = $('#description').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}	
		if(title != '' && location != '' && lotsize != '' && garage != '' && bedrooms != '' && bathrooms != ''  && price != '' && description != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#title').val(data.title);
				$('#location').val(data.location);
				$('#lotsize').val(data.lotsize);
				$('#garage').val(data.garage);
				$('#bedrooms').val(data.bedrooms);
				$('#bathrooms').val(data.bathrooms);
				$('#price').val(data.price);
				$('#description').val(data.description);
				$('.modal-title').text("Update Properties");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Update");
				$('#operation').val("Update");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>