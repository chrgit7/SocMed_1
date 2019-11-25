<!-- simple DB requirements -->
<?php
require '../config/password.php';

$db = new MySQL(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) ;
$db->selectDatabase();
?>
