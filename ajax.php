<?php
session_start();
include './class/dataBase.php';

$action = $_GET['action'];

switch ($action){
    case 'save':
        $db = new dataBase();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $text = $_POST['text_cheburek'];
        $price = $_POST['price'];
        $value = $_POST['value'];
        $db->query("UPDATE cheburek  SET name = '".$name."', text = '".$text."', price = '".$price."', value= '".$value."' WHERE id = ".$id.";");
        $cheburek = $db->queryRow("SELECT * FROM cheburek WHERE id = '".$id."' ;");
        print json_encode($cheburek);
    break;
    case 'new':
        $db = new dataBase();
        $name = $_POST['name'];
        $text = $_POST['text_cheburek'];
        $price = $_POST['price'];
        $value = $_POST['value'];
        $db->query("INSERT INTO cheburek (name,text,price,value) VALUES ('".$name."', '".$text."', '".$price."', '".$value."');");
    break;
    case 'delete':
        $db = new dataBase();
        $id = $_POST['id'];
        $db->query("DELETE FROM cheburek  WHERE id='".$id."';");
    break;
}