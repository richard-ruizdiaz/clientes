<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.ctp');

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
<?php
    echo $this->element('auto_table_warning');

    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>



<?php
    if (strpos($url, '/lavaderos/add/') !== false) {
        echo '<center>';
        echo '<H2> El vehículo ya esta marcado como lavado en el mes ☹ </H2>';
        echo '<a href="javascript: history.go(-1)", class = "btn btn-lg btn-info" >' . 'Volver' . '</a>';
        echo '</center>';
    }else{
        echo '<h2>' . 'Ocurrio un error' . '</h2>';
         echo '<a href="javascript: history.go(-1)", class = "btn btn-lg btn-info" >' . 'Volver' . '</a>';
    }
?>



