<h1>Dados do Usário</h1>
<form action="ifpr/Users/add" method="post">
<?php

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
		array('controller' => 'User','action' => 'index'),
		array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
);

echo $this->Form->end();
?>