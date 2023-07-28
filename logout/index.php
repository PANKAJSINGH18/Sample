<?php
$username = session_name("username");
session_set_cookie_params(0, '/', '.cherryservers.local');
session_start();
session_destroy();
header("Location: /");
?>