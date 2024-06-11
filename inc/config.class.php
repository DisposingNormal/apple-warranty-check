<?php

class PluginAppleWarrantyCheckConfig extends CommonDBTM {

    static function getTypeName($nb = 0) {
        return __('Apple Warranty Check', 'applewarrantycheck');
    }

    static function canCreate() {
        return Session::haveRight('config', UPDATE);
    }

    static function canView() {
        return Session::haveRight('config', READ);
    }
}
