<?php
session_start();
unset($_SESSION['user']);

session_destroy(); // Is Used To Destroy All Sessions

redirect(base_url(),'refresh');
echo '1';
?>
