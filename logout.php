<?php
/**Will allow user to logout out of their session/account*/
SESSION_START();
unset($_SESSION);
SESSION_DESTROY();
header('location: index.php');
$_SESSION['message'] = "You are now logged out" /** WIP - will display message when logged out.*/

?>