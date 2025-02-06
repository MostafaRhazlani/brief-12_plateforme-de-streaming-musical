<?php

    class Controller {
        public function redirect($path) {
            header('location: http://127.0.0.1:8000/?page=' . $path);
        }
    }

?>