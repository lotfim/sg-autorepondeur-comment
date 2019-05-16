<?php
    $agreement_required = ($this->sgarc_features->getAcceptingConditionsRequired()) ? 'required' : '';
?>
<p>
    <input type="checkbox" id="gpdr_required_to_submit_comment" name="gpdr_required_to_submit_comment" <?php echo $agreement_required; ?>>
    <label for="gpdr_required_to_submit_comment"><?php echo esc_html($this->sgarc_features->getAcceptingConditionsText()) ; ?></label>
</p>

