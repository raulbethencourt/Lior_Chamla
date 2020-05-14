<?php

namespace Controllers;

abstract class Controller
{
    protected $_model;
    protected $_modelName; 

    public function __construct()
    {
        $this->_model = new $this->_modelName();
    }
}