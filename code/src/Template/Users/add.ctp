<h1>Register new user </h1> 
<?php
 echo $this->Flash->render('auth');
    echo $this->Form->create($user);
    echo $this->Form->input('name');
    echo $this->Form->input('username');
    echo $this->Form->input('password');		
    echo $this->Form->input('password2',array('label'=>"confirm password",'type'=>'password'));	
    echo $this->Form->input('email');
    echo $this->Form->input('phone');	
    echo $this->Form->input('birthdate',[
		'minYear' => date('Y') - 80,
		'maxYear' => date('Y') - 10
	]);	
		
		
    echo $this->Form->button(__('Register'));
    echo $this->Form->end();
?>