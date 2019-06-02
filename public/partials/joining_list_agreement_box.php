<?php

    $agreement_required = ($this->sgarc_features->getAcceptingConditionsRequired()) ? 'required' : '';
    $id_name_attribute = Sgarc_CommentHandler::ACCEPTING_TO_JOIN_REQUIRED;
?>
<p>
    <input type="checkbox" id="<?php echo esc_attr($id_name_attribute); ?>" name="<?php echo  esc_attr($id_name_attribute); ?>" <?php echo $agreement_required; ?>>
    <label for="<?php echo esc_attr($id_name_attribute); ?>"><?php echo esc_html($this->sgarc_features->getAcceptingConditionsText()) ; ?></label>
</p>

