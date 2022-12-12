<?php
    echo $this->Form->input('first_name', ['label' => 'Nombre']);
    echo $this->Form->input('last_name', ['label' => 'Apellidos']);
    echo $this->Form->input('email', ['label' => 'Correo electrónico']);
    echo $this->Form->input('password', ['label' => 'Contraseña', 'value' => '']);
   echo $this ->Form->input('tipo', array('options' => array("Administrativa", "Vendedor")));
?>