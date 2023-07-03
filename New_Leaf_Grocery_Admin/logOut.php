<?php
error_reporting(0);
session_start();
session_unset();
session_destroy();


echo "<script>alert('Log Out Successfully')</script>";
print'<script>window.location.assign("index.php");</script>';
?>