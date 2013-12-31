<div class="hidden-phone hidden-tablet" id="main-nav">
    <ul>
        <li><?php echo $this->Html->link('<span data-icon="&#xe000;" aria-hidden="true" class="fs1"></span> Home', '/', array('escape' => false)) ?></li>
        <li> <?php echo $this->Html->link('<span data-icon="&#xe0b9;" aria-hidden="true" class="fs1"></span> Department', array('controller' => 'departments', 'action' => 'index'), array('escape' => false)) ?>
            <ul>
                <li> <?php echo $this->Html->link('<span data-icon="&#xe102;" aria-hidden="true" class="fs1"></span> Add Department', array('controller' => 'departments', 'action' => 'add'), array('escape' => false)) ?></li> 
            </ul>
        </li>
        <li> <?php echo $this->Html->link('<span data-icon="&#xe075;" aria-hidden="true" class="fs1"></span> Position', array('controller' => 'positions', 'action' => 'index'), array('escape' => false)) ?>
            <ul>
                <li> <?php echo $this->Html->link('<span data-icon="&#xe102;" aria-hidden="true" class="fs1"></span> Add Position', array('controller' => 'positions', 'action' => 'add'), array('escape' => false)) ?></li>
            </ul>
        </li>
        <li> <?php echo $this->Html->link('<span data-icon="&#xe070;" aria-hidden="true" class="fs1"></span> Staff', array('controller' => 'staffs', 'action' => 'index'), array('escape' => false)) ?>
            <ul>
                <li> <?php echo $this->Html->link('<span data-icon="&#xe102;" aria-hidden="true" class="fs1"></span> Add Staff', array('controller' => 'staffs', 'action' => 'add'), array('escape' => false)) ?></li>                
                <li> <?php echo $this->Html->link('<span data-icon="&#xe1ce;" aria-hidden="true" class="fs1"></span> View List', array('controller' => 'staffs', 'action' => 'list_view'), array('escape' => false)) ?></li>                
                <li> <?php echo $this->Html->link('<span data-icon="&#xe1cf;" aria-hidden="true" class="fs1"></span> View Grid', array('controller' => 'staffs', 'action' => 'grid_view'), array('escape' => false)) ?></li>                
            </ul>
        </li>
    </ul>

</ul>    
<div class="clearfix"></div>
</div>