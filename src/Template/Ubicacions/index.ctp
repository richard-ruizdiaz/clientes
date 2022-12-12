<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3 align="center">LISTADO</h3>
            

        </div>
<div class="table-responsive">
        <?php echo $this->Form->create('ubicacions', array('type' => 'GET', 'class' => 'navbar-form navbar-left', 'url' => array('controller' => 'Ubicacions', 'action' => 'index'))); ?>
         
          <?php echo $this->Form->input('search', ['label' => 'NOMBRE EMPLEADO : ' , 'options' => $users, 'empty' => true]);?>    
          
          <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>  <?php echo $this->Form->end(); ?>
 </div>

        <div class="table-responsive">
             <table class="table  table-sm">
            <thead>
            <tr>
                
               <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('localizacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fechasct') ?></th>
                <th scope="col" class="actions"><?= __('ABRIR UBICACION') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ubicacions as $ubicacion): ?>
            <tr>
                
                 <td><?= $this->Number->format($ubicacion->id) ?></td>
                <td><?= $ubicacion->has('user') ? $this->Html->link($ubicacion->user->first_name . ' ' . $ubicacion->user->last_name, ['controller' => 'Users', 'action' => 'view', $ubicacion->user->id]) : '' ?></td>
                <td><?= h($ubicacion->localizacion) ?></td>
                
                <td><?= $ubicacion->fechasct->modify('-3 hours') ?></td>
                <td class="actions">
                    <a href='https://www.google.com/maps/search/<?= $ubicacion->localizacion ?>' target="_blank" >Enlace</a> 
                </td>
            </tr>
        <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')]) ?></p>
    </div>


    </div>
</div>





