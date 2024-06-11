<?php

define('GLPI_ROOT', '../../..');
include (GLPI_ROOT . "/inc/includes.php");

function plugin_init_applewarrantycheck() {
   global $PLUGIN_HOOKS;

   $PLUGIN_HOOKS['csrf_compliant']['applewarrantycheck'] = true;

   $PLUGIN_HOOKS['menu_toadd']['applewarrantycheck'] = ['tools' => 'PluginAppleWarrantyCheckMenu'];
}

function plugin_version_applewarrantycheck() {
   return [
       'name'           => 'Apple Warranty Check',
       'version'        => '1.0.0',
       'author'         => 'Justin van Beek',
       'license'        => 'MIT',
       'homepage'       => 'https://github.com/DisposingNormal/apple-warranty-check',
       'minGlpiVersion' => '9.4'
   ];
}

function plugin_applewarrantycheck_check_prerequisites() {
   if (version_compare(GLPI_VERSION, '9.4', 'lt')) {
      return false;
   }
   return true;
}

function plugin_applewarrantycheck_check_config() {
   return true;
}
