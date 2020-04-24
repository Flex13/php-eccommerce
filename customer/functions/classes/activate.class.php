<?php
//activation
if (isset($_GET['id'])) {
    $encoded_id = $_GET['id'];
    $decode_id = base64_decode($encoded_id);
    $user_id_array = explode("encodeuserid", $decode_id);
    $id = $user_id_array[1];




    $sql = "UPDATE merchant SET activated=:activated WHERE m_id=:id AND activated='0'";

    $statement = $db->prepare($sql);
    $statement->execute(array(':activated' => "1", ':id' => $id));

    if ($statement->rowCount() == 1) {
        $result = '<h2>Email Confirmed </h2>
    <p>Your email address has been verified. You can now Login to your Shop Admin Dashboard in the account page.</p>
    <p><a href="http://127.0.0.1:8080/customer/my_account.php?login_merchant">Home Page</a></p>'
    ;
    } else {
        $result = "<p class='lead'>No changes made please contact site admin,
        if you have not confirmed your email before</p>";
    }
}

?>