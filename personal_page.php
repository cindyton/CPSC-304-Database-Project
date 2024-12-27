<?php
	$customer_ID = $_COOKIE["customer_ID"];
	$customer_name = $_COOKIE["customer_name"];
	// include ("include/guset_personal_page.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/customer.css">
</head>

<body class="customer">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
					<div class="brand">
						<img src="img/logo.png" alt="logo">
					</div>
					<!-- room_booking -->
				<div class="room_booking">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Room Booking</h4>
							<form method="POST" class="my-login-validation" action="index.php">
								<div class="form-group">
									<label for="roomNumber">Room Number</label>
									<input id="roomNumber" type="number" class="form-control" name="roomNumber" value="" required autofocus>
								</div>
								<div class="form-group m-0">
									<input type="hidden" id="addBooking" name="addBooking">
									<input type="submit" class="btn btn-primary btn-block" value="Book this room" name="addBooking">
								</div>
								<div class="mt-4 text-left">
									 
								</div>
								<div class="form-group m-0">
									<input type="hidden" id="cancelBooking" name="cancelBooking">
									<input type="submit" class="btn btn-primary btn-block" value="Cancel this booking" name="cancelBooking">
								</div>
								<div class="mt-4 text-left">
									You have booked the following rooms: 
									<!-- <?php 
										printResult(executePlainSQL("SELECT room_number FROM Room WHERE customer_ID = '" . $_COOKIE[customer_ID] . "'"));
									?> -->
								</div>
							</form>
						</div>
					</div>
			</div>
					<!-- food_ordering -->
					<div class="food_ordering">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Food Ordering</h4>
							<form method="POST" class="my-login-validation" action="index.php">
								<div class="form-group">
									<label for="foodName">Food Name</label>
									<input id="foodName" type="text" class="form-control" name="foodName" value="" required autofocus>
								</div>
								<div class="form-group m-0">
									<input type="hidden" id="addDish" name="addDish">
									<input type="submit" class="btn btn-primary btn-block" value="Order this food" name="addDish">
								</div>
								<div class="mt-4 text-left">
									 
								</div>
								<div class="form-group m-0">
									<input type="hidden" id="deleteDish" name="deleteDish">
									<input type="submit" class="btn btn-primary btn-block" value="Delete this food" name="deleteDish">
								</div>
								<div class="mt-4 text-left">
									The menu is:
								</div>
								<div class="mt-4 text-left">
									You have ordred:
								</div>
							</form>
						</div>
					</div>
			</div>
					<!-- plan_management -->
					<div class="plan_management">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Plan Management</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="mt-4 text-left">
									Your current plan type is:
								</div>
								<div class="form-group">
									<label for="planType">Change to the following plan type</label>
									<input id="planType" type="planType" class="form-control" name="planType" required data-eye>
								</div>
								<div class="form-group m-0">
									<input type="submit" class="btn btn-primary btn-block" value="Change" name="changePlan">
								</div>
							</form>
						</div>
					</div>
			</div>
			<div class="name_tag">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title"><?php echo "Welcome " . $customer_name; ?></h4>
						</div>
					</div>
			</div>
					<div class="footer">
						Copyright &copy; 2020 &mdash; Non-Existent Hotel International, Inc 
					</div>
					<?php include 'include/guset_personal_page.php'; ?>
					
		</div>
	</section>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
	

</body>
</html>
