<nav class="navbar navbar-inverse nav-users">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= $this->Html->link('INICIO', ['controller' => 'Users', 'action' => 'home'], ['class' => 'navbar-brand']) ?>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <?php if(isset($current_user)): ?>
                <ul class="nav navbar-nav">
                    <?php if($current_user['role'] == 'admin'): ?>
                   
                    <?php endif; ?>
                    
                     <li>
                        <?= $this->Html->link('Listado de Vehiculos', ['controller' => 'Stocks', 'action' => 'index']) ?>
                    </li>

                </ul>
                
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">  <?= $current_user['first_name'] . ' ' . $current_user['last_name'] ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <?= $this->Html->link('Ver Perfil', ['controller' => 'Users', 'action' => 'view', $current_user['id']]) ?>
                    </li>
                    
                    <li>
                      <?= $this->Html->link('Cerrar sesión', ['controller' => 'Users', 'action' => 'logout']) ?>
                    </li>

                  </ul>
                </li>
                <li>
                  <?= $this->Html->link('Cerrar sesión', ['controller' => 'Users', 'action' => 'logout']) ?>
                </li>
              </ul>
            <?php else: ?>
            <ul class="nav navbar-nav navbar-right">
              <li>
                   
              </li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>