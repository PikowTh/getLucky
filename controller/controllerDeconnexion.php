<?php

session_start();

if (isset($_POST['killSession'])) {
    $_SESSION = array();
    session_destroy();
}
