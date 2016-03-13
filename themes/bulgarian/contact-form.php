<div class="color-white little-subscribe-form">
    <div class="form-inline blue-form">
        <div class="es_msg_3">
            <span id="es_msg_pg_3"></span>
        </div>
        <div class="form-group">
            <label for="email-subscribe">Email*</label>
            <input name="es_txt_email_pg_3" id="es_txt_email_pg_3" onkeypress="if(event.keyCode==13) es_submit_pages('<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>',3)" value="" maxlength="225" type="text" class="form-control"  placeholder="">
            <input name="es_txt_name_pg_3" id="es_txt_name_pg_3" value="" type="hidden">
            <input name="es_txt_group_pg_3" id="es_txt_group_pg_3" value="" type="hidden">
        </div>
        <button name="es_txt_button_pg_3" id="es_txt_button_pg_3" onclick="return es_submit_pages('<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>',3)" class="btn blue-button"  type="button">Получай эксклюзив первым</button>
    </div>
</div>

