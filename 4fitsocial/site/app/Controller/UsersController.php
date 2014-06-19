<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');


class UsersController extends AppController
{
	public $helpers = array('Html', 'Form');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('logout');
	}
	
	public function isAuthorized($user) {
		
		return parent::isAuthorized($user);
	}
	
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Erro no login, usuário e/ou senha incorretos'), "flash_notification");
		}
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function index() {
         $this->set('usuarios', $this->User->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Usuário inválido'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->set('user', $user);
    }
    
    public function add()
    {
    	if ($this->request->is('post'))
    	{
    		$this->User->create();
    		$passHash = new SimplePasswordHasher();
    		$this->request->data["senha"] = $passHash->hash($this->request->data["senha"]);
    		if ($this->User->save($this->request->data))
    		{
    			$this->Session->setFlash(__('Usuário criado com sucesso.'), "flash_notification");
    			return $this->redirect(array('action' => 'index'));
    		}
    		$this->Session->setFlash(__('Erro ao criar Usuário.'));
    	}
    }
    
    public function edit($id = null) {
    	$this->layout = 'clean';
    	if (!$id) {
    		throw new NotFoundException(__('Usuário inválido 1'));
    	}
    
    	$user = $this->User->findById($id);
    	if (!$user) {
    		throw new NotFoundException(__('Usuário inválido 2'));
    	}
    
    	if ($this->request->is(array('user', 'put'))) {
    		$this->User->id = $id;
    		if ($this->User->save($this->request->data)) {
    			$this->Session->setFlash(__('Usuário atualizado com sucesso.'), "flash_notification");
    			return $this->redirect(array('action' => 'index'));
    		}
    		$this->Session->setFlash(__('Erro ao atualizar dados.'));
    	}
    
    	if (!$this->request->data) {
    		$this->request->data = $user;
    	}
    }
    
    public function delete($id) {
    	if ($this->request->is('get'))
    	{
    		throw new MethodNotAllowedException();
    	}
    
    	if ($this->User->delete($id))
    	{
    		$this->Session->setFlash(__('Usuário excluído com sucesso.'), "flash_notification");
    		return $this->redirect(array('action' => 'index'));
    	}
    }
}

?>