<?php 
    class ErrorView {
        
        public static function displayError($error = null){
            require "./templates/error.phtml";
        }
    }


?>