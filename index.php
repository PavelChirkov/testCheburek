<?php
    session_start();
    include './view/head.php';
    include './class/dataBase.php';
    ajaxForm();
    include './view/bottom.php';
    function ajaxForm(){
        $db = new dataBase();
        $cheburek = $db->queryFetch("SELECT * FROM cheburek;");
        include './view/vitrina.php';
    }
?>