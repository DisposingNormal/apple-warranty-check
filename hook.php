<?php
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

function plugin_init_applewarrantycheck() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['applewarrantycheck'] = true;
    $PLUGIN_HOOKS['menu_toadd']['applewarrantycheck'] = ['tools' => 'PluginAppleWarrantyCheckMenu'];
}
