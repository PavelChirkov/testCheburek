
<div class="page-contentBlock">
<h3>Все чебуреки</h3>
<? foreach( $cheburek as $row){
    ?>
    <div id="cheburek_<?=$row["id"] ?>" class="vitrina_cheburek">
        <div class="vitrina_name_image">
            <?
                if($row["image"] != ""){?>
                <img src="/img/<?=$row["image"];?>" alt="<?=$row["name"]; ?>" >
            <?}
            ?>
        </div>
        <div class="vitrina_name_cheburek">
            <?=$row["name"]; ?>
        </div>
        <div class="vitrina_text_cheburek">
            <?=$row["text"]; ?>
        </div>
        <div class="vitrina_price_cheburek">
           <span>Цена:</span> <?=$row["price"]; ?> руб.
        </div>
        <div class="vitrina_value_cheburek">
          <span>Остаток: </span> <?=$row["value"]; ?> шт.
        </div>
    </div>
    <hr>
<?
}?>

