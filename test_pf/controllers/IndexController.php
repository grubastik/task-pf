<?

class IndexController extends Zend_Controller_Action {

	public function indexAction() {
		//load list of posts
		$postsTable = new TestPf_ModelTable_Posts();
		$this->view->posts = $postsTable->getPosts();
	}

}
