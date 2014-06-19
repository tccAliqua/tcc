<?php

class DashboardController extends AppController
{
	public $helpers = array('Html', 'Form');
	
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	
	public function index() {
		//$this->layout = 'dashboard';
    }
    
}

?>