<?php

/// begin getRealIpUser functions ///

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

function current_date() {
    $date = new DateTime();
    return $date->format('Y/m/d/H:i:s');
}

/**
 * @param $required_fields_array, n array containing the list of all required fields
 * @return array, containing all errors
 */
function check_empty_fields($required_fields_array){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd popular the form error array
    foreach($required_fields_array as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field . " field is required";
        }
    }

    return $form_errors;
}

/**
 * @param $fields_to_check_length, an array containing the name of fields
 * for which we want to check min required length e.g array('username' => 4, 'email' => 12)
 * @return array, containing all errors
 */
function check_min_length($fields_to_check_length){
    //initialize an array to store error messages
    $form_errors = array();

    foreach($fields_to_check_length as $name_of_field => $minimum_length_required){
        if(strlen(trim($_POST[$name_of_field])) < $minimum_length_required){
            $form_errors[] = $name_of_field . " is too short, must be {$minimum_length_required} characters long";
        }
    }
    return $form_errors;
}

/**
 * @param $data, store a key/value pair array where key is the name of the form control
 * in this case 'email' and value is the input entered by the user
 * @return array, containing email error
 */
function check_email($data){
    //initialize an array to store error messages
    $form_errors = array();
    $key = 'email';
    //check if the key email exist in data array
    if(array_key_exists($key, $data)){

        //check if the email field has a value
        if($_POST[$key] != null){

            // Remove all illegal characters from email
            $key = filter_var($key, FILTER_SANITIZE_EMAIL);

            //check if input is a valid email address
            if(filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false){
                $form_errors[] = $key . " is not a valid email address";
            }
        }
    }
    return $form_errors;
}

/**
 * @param $form_errors_array, the array holding all
 * errors which we want to loop through
 * @return string, list containing all error messages
 */
function show_errors($form_errors_array){
    $errors = "<p><ul class='error'>";

    //loop through error array and display all items in a list
    foreach($form_errors_array as $the_error){
        $errors .= "<li style='list-style: none;'> {$the_error} </li>";
    }
    $errors .= "</ul></p>";
    return $errors;
}

// FUnction for Notifications
function flashMessage($message, $PassOrFail = "Fail") {
    if ($PassOrFail === "Pass" ) {
    $data = "<p class='alert success'>{$message}</p>";
    } else {
        $data = "<p class='alert error'>{$message}</p>";
    }
    return $data;
}

//Function to redirect Page
function redirectTo ($page) {
    header ("location: {$page}.php");
}


//Function to check username
function checkDuplicateUsername($username, $db) {
    try {
        //create SQL query
        $query = "SELECT c_username FROM customers WHERE c_username = :username";
        $statement = $db->prepare($query);
        $statement->execute(array(':username' => $username));

        if ($row = $statement->fetch()){
            return true;
        }else {
            return false;
        }
    } catch (PDOException $ex){
        $result = flashMessage("An error occurred: ".$ex->getMessage());
    }


}

//Function to check Email
function checkDuplicateEmail($email, $db) {
    try {
        //create SQL query
        $query = "SELECT m_email FROM merchant WHERE m_email = :email";
        $statement = $db->prepare($query);
        $statement->execute(array(':email' => $email));

        if ($row = $statement->fetch()){
            return true;
        }else {
            return false;
        }
    } catch (PDOException $ex){
        $result = flashMessage("An error occurred: ".$ex->getMessage());
    }
}
//function to remember me
function rememberMe($user_id) {
    $encyptCookieData = base64_encode("KasiMallOnline{$user_id}");
    //Set cookie to expire in abour 30days;
    setcookie("rememberUserCookie", $encyptCookieData, time()+60*60*24*100, "/");
}

//function to check if cookie is valid

function isCookieValid($db) {
    $isValid = false;

    if (isset($_COOKIE['rememberUserCookie'])) {

        //Decode the cookie and get userID
        $decryptCookieData = base64_decode($_COOKIE['rememberUserCookie']);
        $user_id = explode("KasiMallOnline", $decryptCookieData);
        $userID = $user_id[1];

        // check id from cookie is in the database
        $sqlquery = "SELECT * FROM customers WHERE id = :id";
        $statement = $db->prepare($sqlquery);
        $statement->execute(array(':id' => $userID));

        if($row = $statement->fetch()) {
            $id = $row['id'];
            $username = $row['c_username'];

            //Create User session Variables
            $_SESSION['id'] = $id;
            $_SESSION['c_username'] = $username;
            $isValid = true;
        } else {
            // Cookie ID is invalid Destroy Session and logout User
            $isValid = False;
            signout();
        }

    }
    return $isValid;
}

function signout() {
    unset($_SESSION['íd']);
    unset($_SESSION['ç_username']);
    unset($_SESSION['c_email']);

    if(isset($_COOKIE['rememberUserCookie'])) {
        unset($_COOKIE['rememberUserCookie']);
        setcookie('rememberUserCookie', null, -1, '1');
    }

    session_destroy();
    session_regenerate_id(true);
    redirectTO('index');
}

function guard() {
    $isValid = true;
    $inActive = 60 * 2; //2mins
    $fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

    if((isset($_SESSION['fingerprint']) && $_SESSION['fingerprint'] != $fingerprint)) {
        $isValid = false;
        signout();
    }else if ((isset($_SESSION['last_active']) && (time() - $_SESSION['last_active']) > $inActive) && $_SESSION['username']) {
        $isValid = false;
        signout();
    } else {
        $_SESSION['last_active'] = time();
    }

    return $isValid;
}

function _token() {
    $randomToken = base64_encode(openssl_random_pseudo_bytes(32));

    return $_SESSION['token'] = $randomToken;
}

function validate_token($request_token) {

    if(isset($_SESSION['token']) && $request_token === $_SESSION['token']) {
        unset($_SESSION['token']);

        return true;
    }
    return false;
}

function checkDuplicateEntries($table, $column_name, $value,$db) {
    try {
        $sqlquery = "SELECT * FROM $table WHERE $column_name = :$column_name";
        $statement = $db->prepare($sqlquery);
        $statement->execute(array(":column_name" => $value));

        if($row = $statement->fetch()){
            return true;
        }
        return false;
    } catch (PDOException $ex) {
        
    }
    }

    function prepLogin($id,$email,$username) {
        $_SESSION['id'] = $id;
        $_SESSION['c_email'] = $email;
        $_SESSION['c_username'] = $username;


        $fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        $_SESSION['last_active'] = time();
        $_SSEION['fingerprint'] = $fingerprint;

        
        $result = flashMessage("Login Successful","Pass");
    }

?> 