<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/config/all.php";
session_start();
session_destroy();
header("Location:" . BASE_URL . '/');