<?php
session_start(); // it starts the session
session_destroy(); // when user logs out, destroy the session
header("Location: index.php"); // it will go to homepage after logout
exit;