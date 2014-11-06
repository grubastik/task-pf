<?

class AdminController extends Zend_Controller_Action {

	public function indexAction() {
		//add form only when it is not already present.
		//we should save error messages
		if (!$this->view->form) {
			$this->view->form = new TestPf_Form_Post();
		}
	}

	public function addpostAction() {
		//request should be post
		if (!$this->getRequest()->isPost()) $this->_forward('index');
		//validate data (lenth should not be greater than XXX)
		$this->view->form = new TestPf_Form_Post();
		if ($this->view->form->isValid($this->getRequest()->getPost())) {
			//add record to DB
			$postTable = new TestPf_ModelTable_Posts();
			$newPost = $postTable->createRow();
			$newPost->savePost($this->view->form->getValidValues($this->getRequest()->getPost()));
			//set vars in view.
			$this->view->addedRecord = true;
			$this->view->__unset('form');
		}
		//internal zend redirect
		return $this->_forward('index');
	}

}
