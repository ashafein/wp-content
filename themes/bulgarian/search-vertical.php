<div class="search-form">
    <form name="search" action="<?php get_home_url() ?>/search/" method="get" class="form-inline orange-form">
        <div class="form-group">
            <select name="search_region" class="selectpicker">
                <option disabled selected> Регион </option>
                <?php $categories = get_categories('taxonomy=tax-region'); ?>
                <?php foreach ($categories as $category) : ?>
                    <option <?php echo('value = "'.$category->term_taxonomy_id.'"'); ?>> <?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>

            <select name="search_realty_type" class="selectpicker">
                <option disabled selected> Тип недвижимости </option>
                <?php
                $field = get_field_object('field_56cf66dbf9250'); //get field  realty_type by key in admin-panel editor
                if( $field )
                {
                    foreach( $field['choices'] as $k => $v )
                    {
                        echo '<option value="' . $k . '">' . $v . '</option>';
                    }
                }
                ?>

            </select>

            <input name = "search_price"  type="text" class="form-control"  placeholder="Цена">

            <input  name = "search_lot"  type="text" class="form-control"  placeholder="Номер лота">

        </div>
        <button type="submit" class="btn orange-button">Начать поиск</button>
    </form>
</div>