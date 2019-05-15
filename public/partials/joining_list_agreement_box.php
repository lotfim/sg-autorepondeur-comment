<?php
    $agreement_required = (isset($this->settings['gpdr_required_to_submit_comment']) && $this->settings['gpdr_required_to_submit_comment']) ? 'required' : '';
?>
<p>
    <input type="checkbox" id="gpdr_required_to_submit_comment" name="gpdr_required_to_submit_comment" <?php echo $agreement_required; ?>>
    <label for="gpdr_required_to_submit_comment"><?php echo esc_html($this->settings['gpdr_text']) ; ?></label>
</p>

