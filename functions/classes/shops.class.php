<?php

    $result = $db->prepare("SELECT * FROM merchant WHERE activated = '1' and admin_activated = '1' ORDER BY m_id DESC");
		$result->execute();
		


?>