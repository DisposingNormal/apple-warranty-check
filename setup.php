<?php

// Controleer of de GLPI_ROOT constant al gedefinieerd is
if (!defined('GLPI_ROOT')) {
    define('GLPI_ROOT', '../../..');
}
include(GLPI_ROOT . "/inc/includes.php");

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

function PluginAppleWarrantyCheckMenu() {
    global $LANG;

    $menu = [];
    $menu['title'] = $LANG['plugin_applewarrantycheck']['menu_title']; // Titel van het menu-item
    $menu['page'] = '/plugins/applewarrantycheck/front/your_page.php'; // URL van de pagina voor dit menu-item
    $menu['icon'] = '/plugins/applewarrantycheck/pics/icon.png'; // Pad naar het pictogram voor dit menu-item

    return $menu;
}

/**
 * Installatiefunctie van de plugin
 *
 * @return bool
 */
function plugin_applewarrantycheck_install() {
    global $DB;

    // Hier kun je database tabellen maken of andere installatieprocedures uitvoeren
    // Voorbeeld: het maken van een tabel
    $query = "CREATE TABLE `glpi_plugin_applewarrantycheck_table` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `serial_number` VARCHAR(255) NOT NULL,
        `warranty_status` TEXT NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

    if (!$DB->query($query)) {
        return false;
    }

    return true;
}

/**
 * Deïnstallatiefunctie van de plugin
 *
 * @return bool
 */
function plugin_applewarrantycheck_uninstall() {
    global $DB;

    // Hier kun je database tabellen verwijderen of andere deïnstallatieprocedures uitvoeren
    // Voorbeeld: het verwijderen van een tabel
    $query = "DROP TABLE IF EXISTS `glpi_plugin_applewarrantycheck_table`";

    if (!$DB->query($query)) {
        return false;
    }

    return true;
}

/**
 * Activeer de plugin
 *
 * @return bool
 */
function plugin_applewarrantycheck_activate() {
    // Code om de plugin te activeren, indien nodig
    return true;
}

/**
 * Deactiveer de plugin
 *
 * @return bool
 */
function plugin_applewarrantycheck_deactivate() {
    // Code om de plugin te deactiveren, indien nodig
    return true;
}
