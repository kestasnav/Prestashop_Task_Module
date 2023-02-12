<?php
# /modules/taskmodule/controllers/admin/AdminClientsController.php

/**
 * Task Module - A Prestashop Module
 * 
 * Technical Task
 * 
 * @author kestasnav <kestasnav@gmail.com>
 * @version 0.0.1
 */
 require_once (_PS_MODULE_DIR_ . 'taskmodule/models/Customers.php');
if (!defined('_PS_VERSION_')) exit;

class AdminClientsController extends ModuleAdminController
{
    public function __construct()
    {
        $this->table = 'clients';
        $this->className = 'CustomersModel';
        $this->identifier = CustomersModel::$definition['primary'];
        $this->fields_list = [
            'customer_name' => [
                'title' => 'Vardas'
            ],
            'customer_surname' => [
                'title'=> 'Pavardė'
            ],
            'customer_email' => [
                'title' => 'El. Paštas'
            ]
        ];
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        parent::__construct();
        $this->bootstrap = true;
    }

    /** Render new clients form */
    public function renderForm() {
        $this->fields_form = [
            'legend' => [
                'title' => 'Naujas klientas',
                'icon' => 'icon-plus'
            ],
            'input' => [
                [
                'type' => 'text',
                'label' => 'Vardas',
                'name' => 'customer_name',
                'class' => 'input fixed-with-sm',
                'required' => true,
                'empty_message' => 'Įrašykite vardą'
                    ],
                [
                    'type' => 'text',
                    'label' => 'Pavardė',
                    'name' => 'customer_surname',
                    'class' => 'input fixed-with-sm',
                    'required' => true,
                    'empty_message' => 'Įrašykite pavardę'
                ],
                [
                    'type' => 'text',
                    'label' => 'El. paštas',
                    'name' => 'customer_email',
                    'class' => 'input fixed-with-sm',
                    'required' => true,
                    'empty_message' => 'Įrašykite el. paštą'
                ]
            ],
            'submit' => [
                'title' => 'Išsaugoti'
            ]
        ];
        return parent::renderForm();
    }
}

