<?php

class TestPf_Form_Post extends Zend_Form {

	public function init() {
		$this->setName("post"); //form name
		$this->setMethod('post'); //which method to use to deliver data back to server Get or Post
		$this->setAction('/admin/addpost');//where data should saved attr action
		$this->addElement('text', 'title', array(
			'filters' => array('StringTrim'),
			'validators' => array(array('StringLength', true, array(0, 50))),
			'required' => true,
			'label' => 'Title:' ));

		$this->addElement('textarea', 'text', array(
			'filters' => array('StringTrim'),
			'validators' => array(array('StringLength', true, array(0, 255))),
			'required' => true,
			'label' => 'Text:' ));

		$this->addElement('submit', 'Add', array(
			'required' => false,
			'ignore'   => true,
			'label'	=> 'Add' ));
	}

}
