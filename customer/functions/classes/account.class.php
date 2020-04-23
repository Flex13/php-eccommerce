<?php

if ((isset($_SESSION['id']) || isset($_GET['edit_account'])) && !isset($_POST['update'])) {
    if (isset($_GET['edit_account'])) {
        $url_encoded_id = $_GET['edit_account'];
        $decode_id = base64_decode($url_encoded_id);
        $user_id_array = explode("encodeuserid", $decode_id);
        $id = $user_id_array[1];
    } else {
        $id = $_SESSION['id'];
    }

    $sqlQuery = "SELECT * FROM customers WHERE id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $id));

    while ($rs = $statement->fetch()) {
        $username = $rs['c_username'];
        $email = $rs['c_email'];
        $name = $rs['c_firstname'];
        $surname = $rs['c_surname'];
        $contact = $rs['c_contact'];
        $country = $rs['c_country'];
        $province = $rs['c_province'];
        $city = $rs['c_city'];
        $image = $rs['c_image'];
        $date_joined = strftime("%b %d, %Y", strtotime($rs['c_reg_date']));
    }

    $customer_pic = "customer_images/" . $username . ".jpg";
    $default = "customer_images/avatar.png";

    if (file_exists($customer_pic)) {
        $profile_picture = $customer_pic;
    } else {
        $profile_picture = $default;
    }
    $encode_id = base64_encode("encodeuserid{$id}");
} else if (isset($_POST['update'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Name', 'Surname', 'Email', 'Contact', 'Country', 'Province', 'City');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Name' => 3, 'Surname' => 3, 'Contact' => 10);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation / merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));

        //validate if file has a valid extention
        isset($_FILES['Image']['name']) ? $image = $_FILES['Image']['name'] : $image = null;

        if ($image != null) {
            //email validation / merge the return data into form_error array
            $form_errors = array_merge($form_errors, isValidImage($image));
        }



        // Get all records from inputs
        $username         = $_POST['hidden_username'];
        $name         = $_POST['Name'];
        $surname            = $_POST['Surname'];
        $email         = $_POST['Email'];
        $contact         = $_POST['Contact'];
        $country         = $_POST['Country'];
        $province         = $_POST['Province'];
        $city         = $_POST['City'];
        $hidden_id         = $_POST['hidden_id'];
        $image         = $_FILES['Image']['name'];
        $image_tmp         = $_FILES['Image']['tmp_name'];


        if (empty($form_errors)) {
            try {

                $ds = DIRECTORY_SEPARATOR;
                $image_name = $username . ".jpg";
                $path = "customer_images" . $ds . $image_name;



                // create sql to insert into database
                $update_customer = "UPDATE customers SET c_email=:email,c_firstname=:firstname,c_surname=:surname,c_contact=:contact,c_country=:country,c_province=:province,c_city=:city,c_image=:image WHERE id=:id";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($update_customer);

                // Add the data into the database 
                $statement->execute(array(':email' => $email, ':firstname' => $name, ':surname' => $surname, ':contact' => $contact, ':country' => $country, ':province' => $province, ':city' => $city, ':image' => $image, ':id' => $hidden_id));

                move_uploaded_file($image_tmp, $path);

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {
                    $result = flashMEssage("Update Successfull", "Pass");
                }
            } catch (PDOException $ex) {
                $result = flashMessage("An Error Occerred" . $ex->getMessage());
            }
        } else {
            if (count($form_errors) == 1) {
                $result = flashMessage("There was one error in the form<br>");
            } else {
                $result = flashMessage("There were " . count($form_errors) . " error in the form<br>");;
            }
        }
    } else {
        //Throw and error
        $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
}
