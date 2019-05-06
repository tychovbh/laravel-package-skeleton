<?php

if (!function_exists('spaces')) {

    /**
     * Create string spaces
     * @param int $amount
     * @return string
     */
    function spaces(int $amount): string
    {
        $spaces = '';
        for ($i = 0; $i < $amount; $i++) {
            $spaces .= ' ';
        }

        return $spaces;
    }
}

if (!function_exists('line')) {

    /**
     * Create line
     * @param int $spaces
     * @param string $value
     * @return string
     */
    function line(int $spaces, string $value): string
    {
        return spaces($spaces) . $value . "\r\n";
    }
}
