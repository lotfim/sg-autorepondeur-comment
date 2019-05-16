
<div class="wrap sgarc_form">
    <h2><?php echo get_admin_page_title(); ?></h2>
    <form method="post" action="options.php">
        <?php
            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
        ?>

        <fieldset>
            <label for="<?php echo $this->plugin_name . '-' . Sgarc_Features::USER_ID; ?>"><?php echo _e('Sg-autorepondeur user number', $this->plugin_name); ?>:</label>
            <input type="text" id="<?php echo $this->plugin_name . '-' . Sgarc_Features::USER_ID; ?>" name="<?php echo $this->plugin_name . '[' .Sgarc_Features::USER_ID . ']'; ?>" value="<?php echo $this->sgarc_features->getUserId(); ?>"/>
        </fieldset>
        <br>

        <fieldset>
            <label for="<?php echo $this->plugin_name  . '-' . Sgarc_Features::ACTIVATION_CODE; ?>"><?php echo _e('Activation code', $this->plugin_name); ?>:</label>
            <input type="text" id="<?php echo $this->plugin_name . '-' . Sgarc_Features::ACTIVATION_CODE; ?>" name="<?php echo $this->plugin_name . '[' .Sgarc_Features::ACTIVATION_CODE . ']'; ?>" value="<?php echo $this->sgarc_features->getActivationCode(); ?>"/>
        </fieldset>
        <br>

        <fieldset>
            <label for="<?php echo $this->plugin_name . '-' . Sgarc_Features::LIST_NUMBER; ?>"><?php echo _e('Sg-autorepondeur list number', $this->plugin_name); ?>:</label>
            <input type="text" id="<?php echo $this->plugin_name  . '-' . Sgarc_Features::LIST_NUMBER; ?>" name="<?php echo $this->plugin_name . '[' .Sgarc_Features::LIST_NUMBER . ']'; ?>" value="<?php echo $this->sgarc_features->getListNumber(); ?>"/>
        </fieldset>
        <br>

        <fieldset>
            <label for="<?php echo $this->plugin_name . '-' . Sgarc_Features::GPDR_ENABLED; ?>">
                <span><?php echo _e('Get the comment author\'s email only with his agreement', $this->plugin_name); ?>:</span>
                <input type="checkbox" id="<?php echo $this->plugin_name . '-' . Sgarc_Features::GPDR_ENABLED; ?>" name="<?php echo $this->plugin_name . '[' .Sgarc_Features::GPDR_ENABLED . ']';?>"  <?php if($this->sgarc_features->getGpdrEnabled()) echo 'checked';?> />
            </label>
        </fieldset>
        <br>

        <fieldset>
            <label for="<?php echo $this->plugin_name . '-' . Sgarc_Features::ACCEPTING_CONDITIONS_TEXT; ?>"><?php echo _e('Accepting conditions text', $this->plugin_name); ?>:</label>
            <input class="sgar_comment_text_field" type="text" id="<?php echo $this->plugin_name . '-' . Sgarc_Features::ACCEPTING_CONDITIONS_TEXT; ?>" name="<?php echo $this->plugin_name . '[' .Sgarc_Features::ACCEPTING_CONDITIONS_TEXT . ']'; ?>" value="<?php echo $this->sgarc_features->getAcceptingConditionsText(); ?>"/>
        </fieldset>
        <br>

        <fieldset>
            <label for="<?php echo $this->plugin_name . '-' . Sgarc_Features::ACCEPTING_CONDITIONS_REQUIRED; ?>">
                <span><?php echo _e('Force the comment author to accept to join your list to be able to submit the comment', $this->plugin_name); ?>:</span>
                <input type="checkbox" id="<?php echo $this->plugin_name . '-' . Sgarc_Features::ACCEPTING_CONDITIONS_REQUIRED; ?>" name="<?php echo $this->plugin_name . '[' .Sgarc_Features::ACCEPTING_CONDITIONS_REQUIRED . ']';?>"  <?php  if($this->sgarc_features->getAcceptingConditionsRequired()) echo 'checked';?> />
            </label>
        </fieldset>

        <?php submit_button();?>
    </form>
</div>
