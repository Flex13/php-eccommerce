<?php

//activation
if (isset($_GET['id'])) {
    $shop_encoded_id = $_GET['id'];
    $shop_decode_id = base64_decode($shop_encoded_id);
    $shop_id_array = explode("encodeuserid", $shop_decode_id);
    $shop_id = $shop_id_array[1];


    $sql = "UPDATE merchant SET activated=:activated WHERE m_id=:id AND activated='0'";

    $statement = $db->prepare($sql);
    $statement->execute(array(':activated' => "1", ':id' => $shop_id));

    if ($statement->rowCount() == 1) {
        $result = '<h2>Email Confirmed </h2>
    <p>Your email address has been verified. You can now Login to your Shop Admin Dashboard in the account page.</p>
    <p><a href="https://bts-app.co.za/customer/my_account.php?login_merchant">Home Page</a></p>'
    ;
    } else {
        $result = "<p class='lead'>No changes made please contact site admin,
        if you have not confirmed your email before</p>";
    }
}

?>