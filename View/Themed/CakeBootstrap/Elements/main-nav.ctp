<div class="hidden-phone hidden-tablet" id="main-nav">
    <ul>
        <li><?php echo $this->Html->link('<span data-icon="&#xe000;" aria-hidden="true" class="fs1"></span> Home', '/', array('escape' => false)) ?></li>
        <li> <?php echo $this->Html->link('Department', array('controller' => 'departments', 'action' => 'index'), array('escape' => false)) ?>
            <ul>
                <li> <?php echo $this->Html->link('Add Department', array('controller' => 'departments', 'action' => 'add'), array('escape' => false)) ?></li> 
            </ul>
        </li>
        <li> <?php echo $this->Html->link('Position', array('controller' => 'positions', 'action' => 'index'), array('escape' => false)) ?>
            <ul>
                <li> <?php echo $this->Html->link('Add Position', array('controller' => 'positions', 'action' => 'add'), array('escape' => false)) ?></li>
            </ul>
        </li>
        <li> <?php echo $this->Html->link('Staff', array('controller' => 'staffs', 'action' => 'index'), array('escape' => false)) ?>
            <ul>
                <li> <?php echo $this->Html->link('Add Staff', array('controller' => 'staffs', 'action' => 'add'), array('escape' => false)) ?></li>                
            </ul>
        </li>
    </ul>

</ul>    
<div class="clearfix"></div>
</div>