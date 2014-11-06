<?

class ApiController extends Zend_Controller_Action {

	public function indexAction() {
		//disable render of the view
		$this->getHelper('layout')->disableLayout();
		$this->getHelper('viewRenderer')->setNoRender();
		//request should be post
		if (!$this->getRequest()->isPost()) {
			echo Zend_Json::encode(array('error'=>'Request should be made using POST method'));
			return;
		}
		//check if data type json and parse it
		try {
			$data = Zend_Json::decode($this->getRequest()->getPost('data'));
		}
		catch (Exception $e) {
			echo Zend_Json::encode(array('error'=>'Only JSON data accepted'));
		}
		//check that we have valid data. Here could be added verification for timestamp
		// it will prevent id manipulation on client side and load every time full list of posts
		if (!isset($data['id']) || !is_numeric($data['id']) || $data['id'] != ((int) $data['id'])) {
			echo Zend_Json::encode(array('error'=>'Wrong data type or structure'));
		}
		
		//load posts
		$postTable = new TestPf_ModelTable_Posts();
		$posts = array();
		//prepare data for json
		foreach ($postTable->getNewPostsById($data['id'])->toArray() as $post) {
			$post['created'] = date('d.m.Y @G:i', $post['created']);
			$post = array_map('htmlentities', $post);
			$post['text'] = nl2br($post['text']);
			$posts[] = $post;
		}
		echo Zend_Json::encode(array('posts'=>$posts));
	}

}
