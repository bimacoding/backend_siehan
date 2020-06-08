<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('session','database','mylibrary','pagination','table','form_validation','template','user_agent','email','datatables','encryption');
$autoload['drivers'] = array();
$autoload['helper'] = array('url','form','siehan','download','html','engine','captcha','cookie','string');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('model_app','model_utama','model_ajax');
