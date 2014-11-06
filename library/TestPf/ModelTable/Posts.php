<?

class TestPf_ModelTable_Posts extends Zend_Db_Table_Abstract {
	protected $_name = 'posts';
	protected $_rowClass = 'TestPf_Model_Post';

	//load all available posts
	public function getPosts() {
		$select = $this->select()->from($this->_name)->order(array('created DESC'))->distinct();
		return $this->fetchAll($select);
	}

	//load all new posts after some id
	//here also could be implemented method getNewPostsByCreated. It will get new posts based  on the date of appearence.
	public function getNewPostsById($id) {
		$select = $this->select()->from($this->_name)->where('id > ?', $id)->order(array('created DESC'))->distinct();
		return $this->fetchAll($select);
	}
}
