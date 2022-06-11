<?php
session_start();
require_once './commons/helpers.php';
require_once './vendor/autoload.php';
require_once './commons/lib.php';
require_once './commons/db.php';
require_once './commons/route.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = date("H");
function Greetings($timestamp)
{
    if ($timestamp >= 0 && $timestamp <= 12) {
        return "Buổi sáng.";
    } else {
        if ($timestamp > 12 && $timestamp <= 17) {
            return "Buổi chiều.";
        } else {
            if ($timestamp > 17 && $timestamp <= 20) {
                return "Buổi tối";
            } else {
                return "Buổi tối muộn :3";
            }
        }
    }
}
$_SESSION['goodtime'] = Greetings($timestamp);
$url = isset($_GET['url']) ? $_GET['url'] : "/";

applyRoute($url);
// composer require illuminate/database
// composer require illuminate/events



?>