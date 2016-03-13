<div class="search-form"  id="stick_menu">
    <form name="search" action="<?php get_home_url() ?>/search/" method="get" class="form-inline orange-form">
        <?php $query_vars=$_GET; ?>
        <div class="form-group">
            <select name="search_region" class="selectpicker">
                <option disabled selected> Регион </option>
                <?php
                     $categories = get_categories('taxonomy=tax-region');
                     foreach ($categories as $category) {
                         $selected = '';
                         if($category->term_taxonomy_id == $query_vars['search_region'] ){$selected = 'selected';}
                        echo('<option '.$selected.' value = "'.$category->term_taxonomy_id.'">'.$category->name.'</option>');
                    }
                ?>
            </select>

            <select name="search_realty_type" class="selectpicker">
                <option disabled selected> Тип недвижимости </option>
                <?php
                $field = get_field_object('field_56cf66dbf9250'); //get field  realty_type by key in admin-panel editor
                if( $field )
                {
                    foreach( $field['choices'] as $k => $v )
                    {
                        $selected = '';
                        if($k == $query_vars['search_realty_type'] ){$selected = 'selected';}
                        echo '<option '.$selected.' value="' . $k . '">' . $v . '</option>';
                    }
                }
                ?>

            </select>

            <input name = "search_price"  type="text" class="form-control"  placeholder="Цена" value="<?php echo $query_vars['search_price'] ?>">

            <input  name = "search_lot"  type="text" class="form-control"  placeholder="Номер лота" value="<?php echo $query_vars['search_lot'] ?>">

        </div>
        <button type="submit" class="btn orange-button">Начать поиск</button>
    </form>

</div>