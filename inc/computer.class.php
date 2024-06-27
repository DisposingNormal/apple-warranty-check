<?php

// Add these functions to the existing Computer class

class Computer extends CommonDBTM {
   
   // Your existing methods and properties...

   /**
    * Prepare input data for database storage
    *
    * @param CommonDBTM $computer
    */
   public function prepareInputForAdd($input) {
      $input = parent::prepareInputForAdd($input);
      // Add your custom fields if necessary
      return $input;
   }

   /**
    * Display warranty fields in the Management tab
    */
   public function showForm($ID, $options=array()) {
      global $DB;

      parent::showForm($ID, $options);

      if ($ID > 0) {
         $computer = new Computer();
         $computer->getFromDB($ID);
         
         echo '<tr class="tab_bg_1">';
         echo '<td>' . __('Warranty End Date') . '</td>';
         echo '<td>';
         Html::showDateField('warranty_end_date', ['value' => $computer->fields['warranty_end_date']]);
         echo '</td>';
         echo '<td>' . __('Warranty Duration (months)') . '</td>';
         echo '<td>';
         Html::showField('warranty_duration', ['value' => $computer->fields['warranty_duration']]);
         echo '</td>';
         echo '</tr>';
      }
   }
}
?>