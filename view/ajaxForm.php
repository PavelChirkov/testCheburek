
<div class="page-contentBlock">
<h3>Все чебуреки</h3>
<? foreach( $cheburek as $row){
    ?>
    <div id="cheburek_<?=$row["id"] ?>" class="admin_cheburek">
        <div class="admin_name_image">

            <?
                if($row["image"] != ""){?>
                <img src="/img/<?=$row["image"];?>" alt="<?=$row["name"]; ?>" >
            <?}
            ?>
            <form enctype="multipart/form-data" action="/image.php?id=<?=$row["id"] ?>" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                Отправить этот файл: <input name="userfile" type="file" />
                <input type="submit" value="Отправить файл" />
            </form>
        </div>
        <div class="admin_name_cheburek">
            <?=$row["name"]; ?>
        </div>
        <div class="admin_text_cheburek">
            <?=$row["text"]; ?>
        </div>
        <div class="admin_price_cheburek">
           <span>Цена:</span> <?=$row["price"]; ?> руб.
        </div>
        <div class="admin_value_cheburek">
          <span>Остаток: </span> <?=$row["value"]; ?> шт.
        </div>
        <div class="admin_action_cheburek">
          <div class="form-edit" data-action="<?=$row["id"] ?>" >
                <div class="field"><input type="text" class="name_<?=$row["id"] ?>" value="<?=$row["name"]; ?>"></div>
                <div class="field"><textarea class="text_<?=$row["id"] ?>"><?=$row["text"]; ?></textarea></div>
                <div class="field"><input type="text" class="price_<?=$row["id"] ?>" value="<?=$row["price"]; ?>"></div>
                <div class="field"><input type="text" class="value_<?=$row["id"] ?>" value="<?=$row["value"]; ?>"></div>
                <div class="field"><input type="button" class="save_cheburek" data-action="<?=$row["id"] ?>" value="Сохранить"> </div>
          </div>
          <a class="edit" data-action="<?=$row["id"] ?>" href="">Редактировать</a> |<a class="delete" data-action="<?=$row["id"] ?>" href="">Удалить</a> 
        </div>
    </div>
    <hr>
<?
}?>
<div class="admin_new_cheburek">
    <h3>Новый чебурек</h3>
    <div class="form-edit new-form"  >
                    <div class="field"><input type="text" class="new_cheburek_name" value="" placeholder="Название" required></div>
                    <div class="field"><textarea class="new_cheburek_text" placeholder="Описание" required></textarea></div>
                    <div class="field"><input type="text" class="new_cheburek_price" value="" placeholder="Цена" required></div>
                    <div class="field"><input type="text" class="new_cheburek_value" value="" placeholder="Количество в наличии" required></div>
                    <div class="field"><input type="button" class="new_cheburek"  value="Сохранить" required> </div>
    </div>
</div>

<script>
    $('.edit').click( function(){
        $(this).prev('.form-edit').toggle();
        return false;
    });
    $('.save_cheburek').click(function(){
        id = $(this).attr("data-action");
        name_cheburek = $("input.name_" + id).val();
        text_cheburek = $("textarea.text_" + id).val();
        price_cheburek = $("input.price_" + id).val();
        value_cheburek = $("input.value_" + id).val();
        $.ajax({
            method: "POST",
            url: "ajax.php?action=save",
            data: { id: id, name: name_cheburek, text_cheburek: text_cheburek, price: price_cheburek, value: value_cheburek },
            success: function(data) {
                cheburek = jQuery.parseJSON(data);
                $("#cheburek_" + id + " .admin_name_cheburek").html(cheburek[1]);
                $("#cheburek_" + id + " .admin_text_cheburek").html(cheburek[2]);
                $("#cheburek_" + id + " .admin_price_cheburek").html("<span>Цена:</span> " + cheburek[4] + " руб.");
                $("#cheburek_" + id + " .admin_value_cheburek").html("<span>Остаток:</span> " + cheburek[5] + " шт." );

                $("input.name_" + id).val(cheburek[1]);
                $("textarea.text_" + id).val(cheburek[2]);
                $("input.price_" + id).val(cheburek[4]);
                $("input.value_" + id).val(cheburek[5]);

            }
        }).done(function() {
            alert('данные обновлены');
        });

        return false;
    });

    $('.new_cheburek').click(function(){
        name_cheburek = $("input.new_cheburek_name").val();
        text_cheburek = $("textarea.new_cheburek_text").val();
        price_cheburek = $("input.new_cheburek_price").val();
        value_cheburek = $("input.new_cheburek_value").val();
        $.ajax({
            method: "POST",
            url: "ajax.php?action=new",
            data: {  name: name_cheburek, text_cheburek: text_cheburek, price: price_cheburek, value: value_cheburek }
        }).done(function() {
            alert('чебурек добавлен');
            location.reload();
        });
        return false;
    });
    $('.delete').click(function(){
        id = $(this).attr("data-action");

        $.ajax({
            method: "POST",
            url: "ajax.php?action=delete",
            data: { id: id },
            success: function(data) {
                
            }
        }).done(function() {
            alert("Удалено");
            location.reload();
        });

        return false;
    });

</script>