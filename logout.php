<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['uid']);
header('Location: ' . $_SERVER['HTTP_REFERER']);