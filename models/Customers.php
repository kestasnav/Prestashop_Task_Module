<?php
# /modules/taskmodule/models/Customers.php

/**
 * Task Module - A Prestashop Module
 * 
 * Technical Task
 * 
 * @author kestasnav <kestasnav@gmail.com>
 * @version 0.0.1
 */

if (!defined('_PS_VERSION_')) exit;

class CustomersModel extends ObjectModel
{
	/** Your fields names, adapt to your needs */
	public $id;
	public $customer_name;
	public $customer_surname;
    public $customer_email;

	/** Your table definition, adapt to your needs */
	public static $definition = [
		'table' => 'clients',
		'primary' => 'id',
		'fields' => [
			'customer_name' => [
				'type' => self::TYPE_STRING,
				'validate' => 'isString',
				'size' => 256,
				'required' => true,
			],
			'customer_surname' => [
				'type' => self::TYPE_STRING,
				'validate' => 'isString',
				'size' => 256,
				'required' => true,
			],
            'customer_email' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isString',
                'size' => 256,
                'required' => true,
            ],
		],
	];

	/** Create your table into database, adapt to your needs */
	public static function installSql()
	{
		$tableName = _DB_PREFIX_ . self::$definition['table'];
		$primaryField = self::$definition['primary'];

		$sql = "
			CREATE TABLE IF NOT EXISTS `{$tableName}` (
				`{$primaryField}` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`customer_name` varchar(256) NOT NULL,
				`customer_surname` varchar(256) NOT NULL,
			    `customer_email` varchar(256) NOT NULL,
				PRIMARY KEY (`{$primaryField}`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";

		return Db::getInstance()->execute($sql);
	}

    public static function uninstallSql()
    {
        $tableName = _DB_PREFIX_ . self::$definition['table'];

        $sql = "
			DROP TABLE IF EXISTS `{$tableName}` ";

        return Db::getInstance()->execute($sql);
    }
}

