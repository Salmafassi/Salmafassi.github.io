<?php
session_start();
if(!isset($_SESSION['user_id'])){
    die("ACCESS DENIED");
}
?>