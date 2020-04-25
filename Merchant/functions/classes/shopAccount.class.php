<?php

if ((isset($_SESSION['m_id']) || isset($_GET['s_details'])) && !isset($_POST['updateShop'])) {
    if (isset($_GET['s_details'])) {
        $url_encoded_id = $_GET['s_details'];
        $decode_id = base64_decode($url_encoded_id);
        $user_id_array = explode("encodeuserid", $decode_id);
        $shop_id = $user_id_array[1];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $shop_name = $rs['m_shop_name'];
        $shop_owner_username = $rs['m_username'];
        $shop_email = $rs['m_email'];
        $shop_owner_name = $rs['m_name'];
        $shop_owner_surname = $rs['m_surname'];
        $shop_contact = $rs['m_contact'];
        $shop_country = $rs['m_country'];
        $shop_province = $rs['m_province'];
        $shop_city = $rs['m_city'];
        $shop_image = $rs['m_image'];
        $shop_date_joined = strftime("%b %d, %Y", strtotime($rs['m_reg_date']));
    }

    $customer_pic = "customer_images/" . $username . ".jpg";
    $default = "customer_images/avatar.png";

    if (file_exists($customer_pic)) {
        $profile_picture = $customer_pic;
    } else {
        $profile_picture = $default;
    }
    $shop_encode_id = base64_encode("encodeuserid{$shop_id}");
} else if (isset($_POST['updateShop'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Name','Email', 'Contact', 'Province', 'City');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Name' => 3, 'Contact' => 10);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation / merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));




        // Get all records from inputs
        $shop_owner_username         = $_POST['hidden_shop_username'];
        $shop_name         = $_POST['Name'];
        $shop_email         = $_POST['Email'];
        $shop_contact         = $_POST['Contact'];
        $shop_province         = $_POST['Province'];
        $shop_city         = $_POST['City'];
        $shop_hidden_id         = $_POST['hidden_shop_id'];
        $shop_image         = $_FILES['shop_image']['name'];
        $shop_image_tmp         = $_FILES['shop_image']['tmp_name'];


        if (empty($form_errors)) {
            try {

                $ds = DIRECTORY_SEPARATOR;
                $shop_image_name = $shop_owner_username . ".jpg";
                $path = "customer_images" . $ds . $shop_image_name;



                // create sql to insert into database
                $update_customer = "UPDATE merchant SET m_email=:email,m_shop_name=:shopname,m_contact=:contact,m_province=:province,m_city=:city,m_image=:image WHERE m_id=:id";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($update_customer);

                // Add the data into the database 
                $statement->execute(array(':email' => $shop_email, ':shopname' => $shop_name, ':contact' => $shop_contact, ':province' => $shop_province, ':city' => $shop_city, ':image' => $shop_image, ':id' => $shop_hidden_id));

                move_uploaded_file($shop_image_tmp, $path);

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
