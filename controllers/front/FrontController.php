<?php
# /modules/taskmodule/controllers/front/FrontController.php

/**
 * Task Module - A Prestashop Module
 * 
 * Technical Task
 * 
 * @author kestasnav <kestasnav@gmail.com>
 * @version 0.0.1
 */

if (!defined('_PS_VERSION_')) exit;


class TaskModuleFrontController extends ModuleFrontController
{
	public function __construct()
	{
		parent::__construct();
		// Do your stuff here
	}

    /** Front Controller content page */
	public function initContent()
	{
		$this->context->smarty->assign([
			'greetingsFront' => 'Hello Front from Task Module !',
		]);
		$this->setTemplate('my-front-template.tpl');
		parent::initContent();
	}
}

