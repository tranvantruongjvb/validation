<h1>Edit user data </h1> 
<?php

    echo $this->Form->create($user);
    echo $this->Form->input('name');
    echo $this->Form->input('username');
 	echo $this->Form->input('email');
 	echo $this->Form->input('password');
 	echo $this->Form->input('password2');		
    echo $this->Form->input('phone');	
    echo $this->Form->input('birthdate');		
    echo $this->Form->button(__('Save'));
    echo $this->Form->end();
?>