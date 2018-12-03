<?php
    session_start();
    session_regenerate_id(true);
    session_cache_expire();
    session_destroy();
    unset($_SESSION['SESS_EMAIL']);
	unset($_SESSION['SESS_USERID']);
	unset($_SESSION['SESS_PASS']);
    header('location: ../../login.html');
?>