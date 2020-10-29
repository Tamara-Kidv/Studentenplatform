<?php
session_start();

if($_SESSION['login'] = true)
{
            header('login.php');
            exit;
}

//content voor uitlog pagina

/*
 * session_start();
 * 
 * session_destroy();
 * 
 * redirect naar login o.i.d.
 */

//include("session.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

