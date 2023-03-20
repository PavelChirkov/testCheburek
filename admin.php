<?php
    session_start();
    include './view/head.php';
    include './class/dataBase.php';
    
?>
<? 
    if(isset($_SESSION["login"]) and  $_SESSION["login"] == true){
        ajaxForm();
    }else{
            if(isset($_POST['name']) and $_POST['name'] != ''){
            ////можно еще написать проверку всех POST
            if(($_SESSION["psession"] == $_POST['pvalue']) ){
                $db = new dataBase();
                $result = $db->queryRow("SELECT * FROM user WHERE name = '".$_POST['name']."' ;");
                if(isset($result) and ($result[2] == md5($result[3].$_POST['password']))){
                    $_SESSION["login"] = true;
                    ajaxForm();
                }else{
                    loginForm(1);
                }
            }
            }
            else{
            loginForm(0);
            }
   }
?>


<?php
    include './view/bottom.php';


function loginForm(int $error = 0){
    $psession = mt_rand();
    $_SESSION["psession"] = $psession;
    if($error == 1) $txterror = 'Проверьте данные для входа';
    include './view/form.php';
}
function ajaxForm(){
    $db = new dataBase();
    $cheburek = $db->queryFetch("SELECT * FROM cheburek ;");
    include './view/ajaxForm.php';
}

?>