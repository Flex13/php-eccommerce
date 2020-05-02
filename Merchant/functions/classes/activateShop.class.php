

<?php
if (isset($_POST['Yes'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        $shop_id = $_POST['hidden_shop_id'];

        try {
            //Step 1 -Get User information from database
            $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':id' => $shop_id));

            if ($row = $statement->fetch()) {
                //Step 2 - Deactivate the account
                $activated = $row['admin_activated'];

                $deactivateQuery = $db->prepare("UPDATE merchant SET admin_activated = :activated WHERE m_id = :id");
                $deactivateQuery->execute(array(':activated' => '1', ':id' => $shop_id));

                if ($deactivateQuery->rowCount() === 1) {
                            
                            $result = flashMessage("Your shop has been Published. ", "Pass");
                        }
                    
                } else {
                    $result = flashMessage("Could not complete operation. Please try again or Contact Admin2");
                }
            
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }
    } else {
       //Throw and error
       $result = flashMessage("This request originates from an unknown source. Possible attack");

    }
}


if (isset($_POST['No'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form
        
        $shop_id = $_POST['hidden_shop_id'];

        try {
            //Step 1 -Get User information from database
            $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':id' => $shop_id));

            if ($row = $statement->fetch()) {
                //Step 2 - Deactivate the account
                $activated = $row['admin_activated'];

                $deactivateQuery = $db->prepare("UPDATE merchant SET admin_activated = :activated WHERE m_id = :id");
                $deactivateQuery->execute(array(':activated' => '0', ':id' => $shop_id));

                if ($deactivateQuery->rowCount() === 1) {
                            
                            $result = flashMessage("Your shop has been taken off the public page.");
                        }
                    
                } else {
                    $result = flashMessage("Could not complete operation. Please try again or Contact Admin2");
                }
            
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }

        
    } else {
        $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
}


?>