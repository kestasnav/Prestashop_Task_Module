<?php
# /modules/taskmodule/taskmodule.php

/**
 * Task Module - A Prestashop Module
 * 
 * Technical Task
 * 
 * @author kestasnav <kestasnav@gmail.com>
 * @version 0.0.1
 */

if (!defined('_PS_VERSION_')) exit;

// We look for our model since we want to install its SQL from the module install
require_once(__DIR__ . '/models/Customers.php');

class TaskModule extends Module
{
	const DEFAULT_CONFIGURATION = [];

	public function __construct()
	{
		$this->initializeModule();
	}

	public function install()
	{
		return
			parent::install()
            && CustomersModel::installSql()
			&& $this->installTab()
			&& $this->initDefaultConfigurationValues()
			&& $this->registerHook('displayHome')
            && $this->registerHook('displayFooter')
			&& $this->registerHook('actionProductUpdate');
	}

	public function uninstall()
	{
		return
			parent::uninstall()
            && CustomersModel::uninstallSql()
			&& $this->uninstallTab()
            && $this->initDefaultConfigurationValues()
			&& $this->unregisterHook('displayHome')
            && $this->registerHook('displayFooter')
			&& $this->unregisterHook('actionProductUpdate');
	}


	/** Example of a display hook, which loading css and JS files */
	public function hookDisplayHome()
	{
		// css from here
		$this->context->controller->addCSS($this->_path.'views/css/styles.css','all');
        // javascripts from here
         $this->context->controller->addJS($this->_path . 'views/js/main.js', 'all');
}

    /** Example of a display hook, it's triggered by the footer on the front office */
    public function hookDisplayFooter()
    {
        return $this->display(__FILE__, 'footer.tpl');
    }
		
	/** Action hook, it's triggered after product creation */
    public function hookActionProductUpdate($params)
    {
        if (isset($params['id_product']) && $params['id_product'] != '') {
            $updateSQL = "UPDATE " . _DB_PREFIX_ . "product_lang SET name=concat(name, ' (Bandomoji užduotis)') WHERE id_product = '" . (int)$params['id_product'] . "' AND NOT name like concat('%', ' (Bandomoji užduotis)', '%')";
             DB::getInstance()->execute($updateSQL);
        }
    }
		
	/** Module configuration page */
	public function getContent()
	{
        if(Tools::isSubmit('savebutton')) {
            $task_name = Tools::getValue('task_name');
            Configuration::updateValue('TASKMODULE_STR', $task_name, true);
        }

        if(Tools::isSubmit('savebutton')) {
            $tasks = Tools::getValue('tasks');
            Configuration::updateValue('TASKS_STR', $tasks, true);
        }

        $this->context->smarty->assign(array(
            'TASKMODULE_STR' => Configuration::get('TASKMODULE_STR'),
            'TASKS_STR' => Configuration::get('TASKS_STR')
        ));
		return $this->display(__FILE__, 'configuration.tpl');
    }

	/** Initialize the module declaration */
	private function initializeModule()
	{
		$this->name = 'taskmodule';
		$this->tab = 'others';
		$this->version = '0.0.1';
		$this->author = 'kestasnav';
		$this->need_instance = 1;
		$this->ps_versions_compliancy = [
			'min' => '1.6',
			'max' => _PS_VERSION_,
		];
		$this->bootstrap = true;
		
		parent::__construct();

		$this->displayName = $this->l('Task Module');
		$this->description = $this->l('Technical Task');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall this module ?');
	}

	/** Set module default configuration into database */
	private function initDefaultConfigurationValues()
	{
		foreach (self::DEFAULT_CONFIGURATION as $key => $value) {
			if (!Configuration::get($key)) {
				Configuration::updateValue($key, $value);
			}
		}
		return true;
	}

	/** Install module tab, to your admin controller */
    public function installTab()
    {
        $tab = new Tab();
        $tab->class_name = "AdminClients";
        $tab->module = $this->name;
        $tab->id_parent = 2;
        $tab->position = 6;
        $tab->icon = 'aspect_ratio';

        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = "Clients";
        }

        try {
            $tab->save();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

	/** Uninstall module tab */
	private function uninstallTab()
	{
		$tab = (int)Tab::getIdFromClassName('AdminClients');

		if ($tab) {
			$mainTab = new Tab($tab);

			try {
				$mainTab->delete();
			} catch (Exception $e) {
				echo $e->getMessage();

				return false;
			}
		}
		return true;
	}
}

