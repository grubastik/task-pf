<?

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
//common init methods
	protected function _initDB() {
		$resource = $this->getPluginResource('db');
		Zend_Db_Table_Abstract::setDefaultAdapter($resource->getDbAdapter());
	}

	protected function _initDate() {
		//prevent warning that TZ is not set
		date_default_timezone_set("Europe/Kiev");
	}

	protected function _initView() {
		$view = new Zend_View();
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
			'ViewRenderer'
		);
		$viewRenderer->setView($view);
		return $view;
	}
}
