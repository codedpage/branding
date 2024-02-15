<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
li#bunyad-widget-ads-3,#custom_html-4 {
    list-style: none;
}
</style>
<aside class="col-4 sidebar">

    <div class="inner<?php echo esc_attr($sticky ? ' theiaStickySidebar' : ''); ?>">

        <ul>
            <?php dynamic_sidebar('dir-sidebar'); ?>
        </ul>

    </div>

</aside>
