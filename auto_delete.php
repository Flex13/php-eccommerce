<?php $page_title = 'Kasi Mall Online'; ?>
<?php include('includes/shopheader.php'); ?>
<?php
try {

    $sqlQuery = $db->query("SELECT user_id FROM trash WHERE deleted_at <= CURRENT_DATE - INTERVAL 14 DAY");

    while ($rs = $sqlQuery->fetch()) {
        //Get Recordes from  table
        $user_id = $rs['user_id'];

        $userRecord = $db->prepare("SELECT * FROM customers WHERE id = :id");
        $userRecord->execute(array(':id' => $user_id));

        if ($row = $userRecord->fetch()) {
            $username = $row['c_username'];
            $id = $row['id'];

            $user_pic = "customer_images/" . $username . ".jpg";

            if (file_exists($user_pic)) {
                unlink($user_pic);
            }

            $db->exec("DELETE FROM trash WHERE user_id = $id LIMIT 1");
            $result = $db->exec("DELETE FROM customers WHERE id = $id AND activated = '0' LIMIT 1");
            echo "$result Account Deleted";

            //Email Admin or Write to your log files
        }
    }
} catch (PDOException $ex) {
    //email Admin Errors
}

try {

    $sqlQuery1 = $db->query("SELECT id, c_username FROM customers WHERE c_reg_date <= CURRENT_DATE - INTERVAL 3 DAY AND activated = '0'");

    while ($rs = $sqlQuery1->fetch()) {
        //Get Records from  table
        $user_id = $rs['id'];
        $username = $rs['c_username'];

        //Check User in trash
        $sqlQueryUser = "SELECT * FROM trash WHERE user_id = :id";
        $statement = $db->prepare($sqlQueryUser);
        $statement->execute(array(':id' => $user_id));


        if ($row = $statement->fetch()) {
            $id = $row['user_id'];


            $result = $db->exec("DELETE FROM customers WHERE id = $id AND activated = '0' LIMIT 1");
            echo "$result Account Deleted";

            //Email Admin or Write to your log files
        }
    }
} catch (PDOException $ex) {
    
}
?>


