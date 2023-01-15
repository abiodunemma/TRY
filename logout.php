<?php 
include_once 'db/connect.php';
include_once 'db/session.php';

session_start();
session_destroy();

header('Location: index.php');
$success_msg[] =" you successfully logout";










include_once 'db/alert.php';


?>