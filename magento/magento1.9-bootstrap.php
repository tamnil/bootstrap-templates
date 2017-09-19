<?php
ini_set('memory_limit', '1024M');
set_time_limit(0);

/* Includes */
require_once realpath(__DIR__) . '/../app/Mage.php';

/* Enable developer mode */
Mage::setIsDeveloperMode(true);

Mage::app('admin')->setUseSessionInUrl(false);

$userModel = Mage::getModel('admin/user');
$userModel->setUserId(0);
Mage::getSingleton('admin/session')->setUser($userModel);

Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

/* Undo Magento's hiding of errors */
error_reporting(-1);
ini_set('display_errors', 1);
