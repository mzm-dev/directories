<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe1ce;"></span> Staff List View
                </div>
                <div class="tools">                    
                        <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe14b;">'), array('action' => 'index'), array('data-placement' => 'top', 'data-original-title' => 'Table', 'escape' => FALSE)); ?>                        
                        <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe1ce;">'), array('action' => 'list_view'), array('data-placement' => 'top', 'data-original-title' => 'List', 'escape' => FALSE)); ?>                        
                        <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe1cf;">'), array('action' => 'grid_view'), array('data-placement' => 'top', 'data-original-title' => 'Grid', 'escape' => FALSE)); ?>                        
                </div>
            </div>
            <div class="widget-body">
                <div id="demoOne-nav" class="listNav">
                    <div class="ln-letter-count">11</div>
                </div>
                <div id="scrollbar-one">
                    <div class="scrollbar">
                        <div class="track">
                            <div class="thumb">
                                <div class="end">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="viewport">
                        <div class="overview">
                            <ul id="demoOne" class="demo">
                                <?php foreach ($staffs as $staff): ?>
                                    <li class="ln-<?php echo substr($staff['Staff']['name'], 0, 1); ?>">
                                        <?php echo $this->Html->link(($staff['Staff']['name']), array('action' => 'view', $staff['Staff']['id'])); ?>                                         
                                    </li>
                                <?php endforeach; ?>                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>