
 

 <form id="ls-screen-options-form" method="post" novalidate>  
    <h5><?php _e('Show on screen', 'LayerSlider') ?></h5>
    <label><input type="checkbox" name="showTooltips"<?php echo $lsScreenOptions['showTooltips'] == 'true' ? ' checked="checked"' : ''?>> <?php _e('Tooltips', 'LayerSlider') ?></label><br><br>

    <?php _e('Show me', 'LayerSlider') ?> <input type="number" name="numberOfSliders" min="8" step="4" value="<?php echo $lsScreenOptions['numberOfSliders'] ?>"> <?php _e('sliders per page', 'LayerSlider') ?>
    <button class="button"><?php _e('Apply', 'LayerSlider') ?></button>
</form>  