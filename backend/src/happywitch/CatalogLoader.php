<?php

namespace happywitch;

class CatalogLoader
{
    private $data;

    private static $instance;

    private function __construct()
    {
        $json = file_get_contents('products.json');
        $this->data = json_decode($json, true);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getAllProducts()
    {
        return $this->data;
    }
}