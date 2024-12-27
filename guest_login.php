<?php

        include ("connection.php");

        include ("general_functions.php");

        include ("reset_cmd.php");
        
        function handleResetRequest() {
            global $db_conn;
            // Tables
            global $HotelPlan;
            global $HotelPlanType;
            global $Room;
            global $RoomType;
            global $Sell;
            global $Product;
            global $Purchase_from;
            global $Supplier;
            global $Storage;
            global $Order_Dish;
            global $Customer;
            global $Dish;
            global $Kitchen;
            global $Room_Service;
            global $Customer_Service;
            global $Department;
            // Drop old table
            executePlainSQL("drop table HotelPlan");
            executePlainSQL("drop table HotelPlanType");
            executePlainSQL("drop table Room");
            executePlainSQL("drop table RoomType");
            executePlainSQL("drop table Sell");
            executePlainSQL("drop table Product");
            executePlainSQL("drop table Purchase_from");
            executePlainSQL("drop table Supplier");
            executePlainSQL("drop table Storage");
            executePlainSQL("drop table Order_Dish");
            executePlainSQL("drop table Customer");
            executePlainSQL("drop table Dish");
            executePlainSQL("drop table Kitchen");
            executePlainSQL("drop table Room_Service");
            executePlainSQL("drop table Customer_Service");
            executePlainSQL("drop table Department");
            // Create new table
            echo "<br> creating new table <br>";
            executePlainSQL($Department);
            executePlainSQL($Customer_Service);
            executePlainSQL($Room_Service);
            executePlainSQL($Kitchen);
            executePlainSQL($RoomType);
            executePlainSQL($HotelPlanType);
            executePlainSQL($Dish);
            executePlainSQL($Customer);
            executePlainSQL($Room);
            executePlainSQL($Order_Dish);
            executePlainSQL($Storage);
            executePlainSQL($Supplier);
            executePlainSQL($Purchase_from);
            executePlainSQL($Product);
            executePlainSQL($Sell);
            executePlainSQL($HotelPlan);
            // initialize Department
            $Department_tuple_1 = array (
                ":department_Name" => "department_1",
                ":department_ID" => 1,
                ":phone_number" => 123456
            );

            $Department_tuple_2 = array (
                ":department_Name" => "department_2",
                ":department_ID" => 2,
                ":phone_number" => 14231234
            );

            $Department_tuple_3 = array (
                ":department_Name" => "department_3",
                ":department_ID" => 3,
                ":phone_number" => 23654263
            );

            $Department_tuples = array (
                $Department_tuple_1,
                $Department_tuple_2,
                $Department_tuple_3
            );

            executeBoundSQL("insert into Department values (:department_Name,
                                                            :department_ID, 
                                                            :phone_number)", $Department_tuples);
            // initialize Customer_Service
            $Customer_Service_tuple = array (
                ":customer_service_ID" => 1
            );

            $Customer_Service_tuples = array (
                $Customer_Service_tuple
            );

            executeBoundSQL("insert into Customer_Service values (:customer_service_ID)", $Customer_Service_tuples);

            // initialize room service
            $Room_Service_tuple = array (
                ":room_service_ID" => 2
            );

            $Room_Service_tuples = array (
                $Room_Service_tuple
            );

            executeBoundSQL("insert into Room_Service values (:room_service_ID)", $Room_Service_tuples);
            // initialize kitchen
            $Kitchen_tuple = array (
                ":kitchen_ID" => 3
            );

            $Kitchen_tuples = array (
                $Kitchen_tuple
            );

            executeBoundSQL("insert into Kitchen values (:kitchen_ID)", $Kitchen_tuples);

            // initialize room type
            $RoomType_tuple_1 = array (
                ":type" => "A",
                ":price" => 500
            );

            $RoomType_tuple_2 = array (
                ":type" => "B",
                ":price" => 300
            );

            $RoomType_tuple_3 = array (
                ":type" => "C",
                ":price" => 100
            );

            $RoomType_tuples = array (
                $RoomType_tuple_1,
                $RoomType_tuple_2,
                $RoomType_tuple_3
            );

            executeBoundSQL("insert into RoomType values (:type, :price)", $RoomType_tuples);

            // initialize hotel plan type
            $HotelPlanType_tuple_1 = array (
                ":type" => "A",
                ":price" => 5000
            );

            $HotelPlanType_tuple_2 = array (
                ":type" => "B",
                ":price" => 3000
            );

            $HotelPlanType_tuple_3 = array (
                ":type" => "C",
                ":price" => 1000
            );

            $HotelPlanType_tuples = array (
                $HotelPlanType_tuple_1,
                $HotelPlanType_tuple_2,
                $HotelPlanType_tuple_3
            );

            executeBoundSQL("insert into HotelPlanType values (:type, :price)", $HotelPlanType_tuples);

            // initialize room
            $Room_tuples = array();
            for($i = 0; $i < 500; $i++) {
                $Room_tuples[$i] = array (
                    ":room_number" => $i + 1,
                    ":type" => "A",
                    ":department_ID" => 2,
                    ":customer_ID" => null
                );
            }
            executeBoundSQL("insert into Room values (:room_number, 
                                                      :type,
                                                      :department_ID,
                                                      :customer_ID)", $Room_tuples);

            // initialize Dish
            $Dish_tuples = array();
            for($i = 0; $i < 10; $i++) {
                $Dish_tuples[$i] = array (
                    ":dish_ID" => $i + 1,
                    ":price" => 10 + ($i * 13),
                    ":dish_name" => null,
                    ":department_ID" => 3,
                );
            }
            $Dish_tuples[0][":dish_name"] = "Beef Stroganoff";
            $Dish_tuples[1][":dish_name"] = "Reuben";
            $Dish_tuples[2][":dish_name"] = "Sandwich";
            $Dish_tuples[3][":dish_name"] = "Waldorf Salad";
            $Dish_tuples[4][":dish_name"] = "French Fries";
            $Dish_tuples[5][":dish_name"] = "Caesar Salad";
            $Dish_tuples[6][":dish_name"] = "Chicken à la King";
            $Dish_tuples[7][":dish_name"] = "Lobster Newburg";
            $Dish_tuples[8][":dish_name"] = "Salisbury Steak";
            $Dish_tuples[9][":dish_name"] = "Baked Alaska";
            executeBoundSQL("insert into Dish values (:dish_ID,
                                                      :price,
                                                      :dish_name,
                                                      :department_ID)", $Dish_tuples);

            OCICommit($db_conn);
        }

        function handleLoginRequest() {
            global $db_conn;
            echo "handling login <br>";
            $result = executePlainSQL("SELECT customer_ID, customer_name FROM Customer WHERE customer_email = '" . $_POST[email] . "' AND password = '" . $_POST[password] . "'");
            if (($c_info = oci_fetch_row($result)) != false) {
                echo "logged in as '" . $c_info[1] . "'<br>";
                setcookie("customer_ID", $c_info[0]);
                setcookie("customer_name", $c_info[1]);
                header('Location: personal_page.php');
            } else {
                echo "email or password is incorrect <br>";
            }

        }

        function handlePOSTRequest() {
            echo "handling POST <br>";
            if (connectToDB()) {
                if (array_key_exists('reset', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('login', $_POST)) {
                    handleLoginRequest();
                }

                disconnectFromDB();
            }
        }


        echo "execution reached<br>";
        if (isset($_POST['reset']) || isset($_POST['login'])) {
            handlePOSTRequest();
        }
?>