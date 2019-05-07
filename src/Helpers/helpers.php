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

if (!function_exists('default_file')) {

    /**
     * Open default file
     * @param string $file
     * @return string
     */
    function default_file(string $file): string
    {
        return file_get_contents(sprintf('%s/../files/%s', __DIR__, $file));
    }
}

if (!function_exists('file_replace')) {

    /**
     * Open default file
     * @param string $file
     * @param array $replacements
     * @param string $destination
     * @return string
     */
    function file_replace(string $file, array $replacements, string $destination = null)
    {
        $contents = default_file($file);

        foreach ($replacements as $str => $replacement) {
            $contents = str_replace($str, $replacement, $contents);
        }

        if ($destination) {
            make_directories($destination);
        }

        file_put_contents($destination ?? $file, $contents);
    }
}

if (!function_exists('make_directories')) {

    /**
     * @param string $path
     */
    function make_directories(string $path)
    {
        $dirs = explode('/', $path);
        array_pop($dirs);
        if ($dirs) {
            mkdir(implode('/', $dirs), 0777, true);
        }
    }
}
