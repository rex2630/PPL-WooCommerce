<?php
// phpcs:ignoreFile WordPress.Security.EscapeOutput.OutputNotEscaped

defined("WPINC") or die();
?>
    <img src='<?php echo esc_url($img) ?>' style='height: 1em;'>
    <?php
    echo $label_safe;
    ?>


