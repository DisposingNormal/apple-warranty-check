<?php

include('../../../inc/includes.php');

Session::checkRight("config", READ);

Html::header(__('Apple Warranty Check', 'applewarrantycheck'), $_SERVER['PHP_SELF'], "config", "plugins");

if (isset($_POST['serial_number'])) {
    $serial_number = $_POST['serial_number'];
    $result = PluginAppleWarrantyCheck::checkWarranty($serial_number);
    echo "<pre>$result</pre>";
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table class="tab_cadre_fixe">
        <tr class="tab_bg_1">
            <td><?php echo __('Serial Number', 'applewarrantycheck'); ?></td>
            <td><input type="text" name="serial_number" required></td>
        </tr>
        <tr class="tab_bg_1">
            <td colspan="2" class="center">
                <input type="submit" name="submit" value="<?php echo __('Check Warranty', 'applewarrantycheck'); ?>" class="submit">
            </td>
        </tr>
    </table>
</form>

<?php
Html::footer();
?>
