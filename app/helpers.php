<?php

function dbDate($date) {
    return implode('-', array_reverse(explode('/', $date))) . ' 00:00:00';
}

function brDate($date) {
    return isset($date) ? date("d/m/Y", strtotime($date)) : '';
}

function isChecked($search, $array) {
    if(is_array($array)) {
        return in_array($search, $array);
    }

    return false;
}

function arrayToStr($array) {
    if(is_null($array)) {
        return null;
    }

    return implode(',', $array);
}

function strToArray($str) {
    if (is_null($str)) {
        return null;
    }

    return explode(',', $str);
}
