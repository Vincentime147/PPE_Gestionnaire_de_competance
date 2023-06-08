<?php

namespace App\utils;

class Renderer  {
    


    public static function render($file, $data = null){
        $path = __DIR__ . DIRECTORY_SEPARATOR . "../views" . DIRECTORY_SEPARATOR . $file;
        ob_start();
        if($data != null){
            extract($data);
        }

        include_once $path;

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }


}
