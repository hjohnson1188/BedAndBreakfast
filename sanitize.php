<?php

    function sanitizeString($type, $field) {
        $output = filter_input($type, $field, FILTER_SANITIZE_STRING);

        return $output;
    }
    
    function sanitizeEmail($type, $field) {
        $output = filter_input($type, $field, FILTER_SANITIZE_EMAIL);

        return $output;
    }
    
    function sanitizeNumber($type, $field) {
        $output = filter_input($type, $field, FILTER_SANITIZE_NUMBER_INT);

        return $output;
    }


