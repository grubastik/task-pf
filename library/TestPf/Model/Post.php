<?

class TestPf_Model_Post extends Zend_Db_Table_Row_Abstract {

	//save new post
	public function savePost($post) {
		$this->title = $post['title'];
		$this->text = $post['text'];
		$this->created = time();
		$this->save();
	}
}
