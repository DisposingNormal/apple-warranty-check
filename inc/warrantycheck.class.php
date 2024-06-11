<?php

class PluginAppleWarrantyCheck extends CommonDBTM {

    static function getTypeName($nb = 0) {
        return __('Apple Warranty Check', 'applewarrantycheck');
    }

    static function canCreate() {
        return Session::haveRight('config', UPDATE);
    }

    static function canView() {
        return Session::haveRight('config', READ);
    }

    static function checkWarranty($serial_number) {
        $url = "https://checkcoverage.apple.com/us/en/?sn=" . $serial_number;
        $options = [
            "http" => [
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3\r\n"
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            return __("Fout bij het opvragen van garantie informatie. Controleer het serienummer en probeer opnieuw.", 'applewarrantycheck');
        } else {
            return $result; // Of verwerk de HTML om de garantie-informatie te extraheren
        }
    }
}
