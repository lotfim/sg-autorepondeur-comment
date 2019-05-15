<?php


    $settings = get_option($this->plugin_name);
    $userNumber =(isset($settings['user_number'])) ? $settings['user_number'] : '';
    $activationCode =(isset($settings['activation_code'])) ? $settings['activation_code'] : '';
    $listNumber =(isset($settings['list_number'])) ? $settings['list_number'] : '';
    $gpdrEnabled = (isset($settings['gpdr_enabled']) && $settings['gpdr_enabled']) ? 'checked' : '';
    $gpdrText = (isset($settings['gpdr_text'])) ? $settings['gpdr_text'] : '';
    $gpdrRequiredToSubmitComment = (isset($settings['gpdr_required_to_submit_comment']) && $settings['gpdr_required_to_submit_comment']) ? 'checked' : '';

?>

<div class="wrap sgarc_form">
    <h2><?php echo get_admin_page_title(); ?></h2>
    <form method="post" action="options.php">
        <?php
            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
        ?>

        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-user_number"><?php echo _e('Sg-autorepondeur user number', $this->plugin_name); ?>:</label>
            <input type="text" id="<?php echo $this->plugin_name; ?>-user_number" name="<?php echo $this->plugin_name; ?>[user_number]" value="<?php echo $userNumber; ?>"/>
        </fieldset>
        <br>

        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-activation_code"><?php echo _e('Activation code', $this->plugin_name); ?>:</label>
            <input type="text" id="<?php echo $this->plugin_name; ?>-activation_code" name="<?php echo $this->plugin_name; ?>[activation_code]" value="<?php echo $activationCode; ?>"/>
        </fieldset>
        <br>

        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-list_number"><?php echo _e('Sg-autorepondeur list number', $this->plugin_name); ?>:</label>
            <input type="text" id="<?php echo $this->plugin_name; ?>-list_number" name="<?php echo $this->plugin_name; ?>[list_number]" value="<?php echo $listNumber; ?>"/>
        </fieldset>
        <br>

        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-gpdr_enabled">
                <span><?php echo _e('Get the comment author\'s email only with his agreement', $this->plugin_name); ?>:</span>
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-gpdr_enabled" name="<?php echo $this->plugin_name;?>[gpdr_enabled]"  <?php echo $gpdrEnabled;?> />
            </label>
        </fieldset>
        <br>

        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-gpdr_text"><?php echo _e('Accepting conditions text', $this->plugin_name); ?>:</label>
            <input class="sgar_comment_text_field" type="text" id="<?php echo $this->plugin_name; ?>-gpdr_text" name="<?php echo $this->plugin_name; ?>[gpdr_text]" value="<?php echo $gpdrText; ?>"/>
        </fieldset>
        <br>

        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-gpdr_required_to_submit_comment">
                <span><?php echo _e('Force the comment author to accept to join your list to be able to submit the comment', $this->plugin_name); ?>:</span>
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-gpdr_required_to_submit_comment" name="<?php echo $this->plugin_name;?>[gpdr_required_to_submit_comment]"  <?php echo $gpdrRequiredToSubmitComment;?> />
            </label>
        </fieldset>

        <?php submit_button();?>
    </form>
</div>
