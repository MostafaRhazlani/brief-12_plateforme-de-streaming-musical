<?php

    class Controller {
        public function redirect($path) {
            header('location: ?page=' . $path);
        }
    }

?>