<?php
	include ("connection.php");

    include ("general_functions.php");

    include ("reset_cmd.php");

    function handlePOSTRequest() {
        echo "handling POST <br>";
        if (connectToDB()) {
            if (array_key_exists('addBooking', $_POST)) {
                handleAddBookingRequest();
            } else if (array_key_exists('cancelBooking', $_POST)) {
                handleCancelBookingRequest();
            } else if (array_key_exists('addDish', $_POST)) {
                handleAddDishRequest();
            } else if (array_key_exists('deleteDish', $_POST)) {
                handleDeleteDishRequest();
            } else if (array_key_exists('changePlan', $_POST)) {
                handleChangePlanRequest();
            }

            disconnectFromDB();
        }
    }


    echo "execution reached<br>";
    if (isset($_POST['addBooking']) || 
    	isset($_POST['cancelBooking']) || 
    	isset($_POST['addDish']) || 
    	isset($_POST['deleteDish']) || 
    	isset($_POST['changePlan'])) {
        handlePOSTRequest();
    }
