<?
class ErrorController extends Zend_Controller_Action {

	public function errorAction() {
		$this->view->friendly_error_message = "Hello.\nUnexpected error occured in the system.\nPlease return on main page and try again.\n\n If error appeared again at the same place please, retry later. Support team is notified and working on this problem.\n\n Thank You for understanding.";

		//log all error to error_log
		error_log(print_r($this->getResponse()->getException(), true));
	}

}
