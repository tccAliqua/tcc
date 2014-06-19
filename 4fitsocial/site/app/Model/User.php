<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
	public $useTable = "tb_usuarios";
	
	public $validate = array(
			'nome' => array(
					'rule' => 'notEmpty'
			),
			'username' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Login é obrigatório'
					)
			),
			'password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Senha é obrigatório'
					)
			),
			'role' => array(
					'valid' => array(
							'rule' => array('inList', array('admin', 'user', 'academia', 'professor')),
							'message' => 'Please enter a valid role',
							'allowEmpty' => false
					)
			)
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
			);
		}
		return true;
	}
}
?>