<?php

include('../../../inc/includes.php');

Session::checkRight("config", READ);

Html::header(__('Apple Warranty Check', 'applewarrantycheck'), $_SERVER['PHP_SELF'], "config", "plugins");

if (isset($_POST['serial_number']) && isset($_POST['computer_id'])) {
   $serial_number = $_POST['serial_number'];
   $computer_id = $_POST['computer_id'];
   
   // Fetch warranty information
   $result = PluginAppleWarrantyCheck::checkWarranty($serial_number);

   // Parse result (assuming result is JSON)
   $warranty_info = json_decode($result, true);
   
   if ($warranty_info) {
      // Update Computer asset with warranty information
      $computer = new Computer();
      $input = [
         'id' => $computer_id,
         'warranty_end_date' => $warranty_info['warranty_end_date'],
         'warranty_duration' => $warranty_info['warranty_duration']
      ];
      $computer->update($input);

      Html::back();
   } else {
      echo __('Fout bij het opvragen van garantie informatie. Controleer het serienummer en probeer opnieuw.', 'applewarrantycheck');
   }
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <table class="tab_cadre_fixe">
      <tr class="tab_bg_1">
         <td><?php echo __('Serial Number', 'applewarrantycheck'); ?></td>
         <td><input type="text" name="serial_number" required></td>
      </tr>
      <tr class="tab_bg_1">
         <td><?php echo __('Computer ID', 'applewarrantycheck'); ?></td>
         <td><input type="text" name="computer_id" required></td>
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