<div class="row-fluid agent-item">
    <div class="agent-pict"> <img src="<?php echo (types_render_field("manager_photo", array("raw"=>"true"))); ?>" /></div>
    <div class="agent-content">
        <p><?php echo(types_render_field("manager_fio", array("raw"=>"true"))); ?></p>
        <div class="text-color-black agent-contacts">
            <div class="agent-phone">
                <i class="fa fa-phone text-color-blue"></i><?php echo(types_render_field("manager_phone", array("raw"=>"true"))); ?>
            </div>
            <div  class="agent-mail">
                <i class="fa fa-envelope-o text-color-blue"></i><?php echo(types_render_field("manager_email", array("raw"=>"true"))); ?>
            </div>
            <div class="agent-callback">
                <i class="fa fa-skype text-color-blue"></i><?php echo(types_render_field("manager_skype", array("raw"=>"true"))); ?>
            </div>
        </div>
    </div>
</div>