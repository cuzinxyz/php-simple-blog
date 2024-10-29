<?php

class File 
{
    public function __construct()
    {
        
    }

    public static function createFile(string $fileName, string $content)
    {
        try {
            $file = fopen($fileName, "a+") or die("Unable to open file!");

            $data = date("Y/m/d H:i:s") . ": " . $content . "\n";

            fwrite($file, $data);
            fclose($file);

            return true;
        } catch (Exception $e) {
            echo 'File exception: ' . $e->getMessage();
            return false;
        }
    }
}