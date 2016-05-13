<?php
/**
 * Return the file uri with a cachebusting parameter at the end.
 * @param $file string
 * @return string
 */
if (! function_exists('cache_bust')) :
    function cache_bust($file)
    {
        $path = public_path($file);
        if (! file_exists($path)) {
            throw new \InvalidArgumentException("File $path does not exist.");
        }
        return sprintf("/%s?t=%s",$file,filemtime($path));
    }
endif;