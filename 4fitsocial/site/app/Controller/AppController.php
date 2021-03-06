<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');


class AppController extends Controller
{
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array(
				'controller' => 'dashboard',
				'action' => 'index'
			),
			'logoutRedirect' => array(
				'controller' => 'pages',
				'action' => 'display',
				'home'
			),
			'authorize' => array('Controller')
		)
	);
	
	public function isAuthorized($user)
	{
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
	
		// Default deny
		return false;
	}
	
	public function beforeFilter() {
		$this->Auth->allow('display');
	}
	
	
	
	
	// Default deny
	//	return true;
	//}
	
	//public function beforeFilter() {
		//$this->Auth->allow('display', 'index', 'add', 'edit');
	//}
	
}
