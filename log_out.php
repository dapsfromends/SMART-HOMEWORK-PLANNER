<?php

session_start();

if(isset($_SESSION['username'])) {
   
    $_SESSION = array();
    
    
    session_destroy();
    
    
    {
        echo ("<script>alert('User logout successfully.'); window.location.href = 'index.html';</script>");
    exit;
    }
} else {
    
    echo "<script>alert('User logout successfully.'); window.location.href = 'index.html';</script>";
    exit;
}
