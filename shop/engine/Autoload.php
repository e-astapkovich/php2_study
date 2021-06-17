<?php

class Autoload {
    private $vendor = "app";

    public function loadClass($className) {
        $path = str_replace([$this->vendor, "\\"], ["../", "/"], $className) . ".php";
        include $path;
    }
}