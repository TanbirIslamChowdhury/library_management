<?php
include '../admin/class/crud.php';
$mysqli=new crud();
session_start();
$baseurl=$mysqli->base_url;
