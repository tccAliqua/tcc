<h1>Gerenciamento de Usuários</h1>
<br/>

<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Novo</button>
<br/><br/>
<table>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Login</th>
        <th>Regra</th>
        <th>Ações</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($usuarios as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php
            	echo $this->Html->link($user['User']['nome'],
				array('controller' => 'usuario', 'action' => 'view', $user['User']['id']));
			?>
        </td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['role']; ?></td>
        <td>
        	<?php
        	echo $this->Html->link(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . " Editar",
        			array('controller' => 'users', 'action' => 'edit', $user['User']['id'], 'role' => 'button'),
					array('class' => 'btn btn-warning', 'escape' => false, "data-toggle"=>"modal",
					"data-target"=>"#myModal")
        	);
        	?>
        	<?php
        	echo $this->Form->postLink(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Remover",
        			array('controller' => 'users','action' => 'delete', $user['User']['id']),
        			array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
        	);
        	?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      	
        <?php
			echo $this->Form->create('User', array('action' => 'login'));
			echo $this->Form->input('nome');
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			echo $this->Form->input('role');
			
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
					array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
			);
			echo " ";
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
					array('controller' => 'Users','action' => 'index'),
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
			);
			
			echo $this->Form->end();
		?>
      </div>
    </div>
  </div>
</div>