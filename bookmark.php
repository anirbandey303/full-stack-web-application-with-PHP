<?php
session_start();
include '../includes/db_connect.php';
$subjectCode = $_GET['subject_code'];
echo $subjectCode;
echo $_SESSION['userData']['id'];
?>