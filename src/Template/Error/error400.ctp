<?php
use Cake\Core\Configure;

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?= Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>

<p class="error">
   
    <?php 
    
    
    
    if(substr($url, 0 , 8) == '/stocks/'){
        echo '<center>';
        echo '<H2> El vehículo ya no se encuentra en Stock ☹ </H2>';
        echo $this->Html->link(' <- VOLVER A BUSQUEDA', ['controller' => 'stocks', 'action' => 'index'], ['class' => 'btn btn-sm btn-info']);
        echo '</center>';
    }else {
         echo '<h2>' . 'Ocurrio un error' . '</h2>';
         echo '<a href="javascript: history.go(-1)", class = "btn btn-lg btn-info" >' . 'Volver' . '</a>';
    }
    
    ?>
</p>
