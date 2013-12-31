<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14b;"></span>Staffs
                </div>
                <div class="tools">                    
                        <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe14b;">'), array('action' => 'index'), array('data-placement' => 'top', 'data-original-title' => 'Table', 'escape' => FALSE)); ?>                        
                        <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe1ce;">'), array('action' => 'list_view'), array('data-placement' => 'top', 'data-original-title' => 'List', 'escape' => FALSE)); ?>                        
                        <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe1cf;">'), array('action' => 'grid_view'), array('data-placement' => 'top', 'data-original-title' => 'Grid', 'escape' => FALSE)); ?>                        
                </div>
            </div>
            <div class="widget-body">
                <div class="row-fluid">
                    <?php echo $this->Form->create('Staff', array('action' => 'index', 'type' => 'Staffs')); ?>
                    <div class="span6 input-prepend input-append no-margin">                       
                        <span class="add-on">Search Name</span>
                        <?php echo $this->Form->input('query', array('value' => isset($query) ? $query : null, 'class' => 'span8', 'label' => false, 'div' => false)); ?>                                                               
                    </div>                                                  
                    <div class="span6 input-prepend input-append">    
                        <?php echo $this->Form->button('Search', array('div' => false, 'class' => 'btn btn-success')); ?>                    
                        <?php echo $this->Html->link('Reset', array('action' => 'index'), array('class' => 'btn btn-success', 'escape' => false)); ?>
                    </div>
                    <?php echo $this->Form->end(); ?>
                    <table id="table-programs" class="table table-condensed table-striped table-bordered table-hover no-margin">                        
                        <tr>
                            <th class="span1"><?php echo __('id'); ?></th>
                            <th><?php echo __('Nama'); ?></th>  
                            <th><?php echo __('Position'); ?></th>                                                                               
                            <th class="span2"><?php echo __('phone'); ?></th>  
                            <th class="span2"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 1;
                        $current_department = '';
                        foreach ($staffs_array as $staff):
                            ?>
                            <?php if ($current_department != $staff['Department']['name']): ?>
                                <tr>
                                    <th colspan="9"><?php echo 'Department: ' . $staff['Department']['name']; ?></th>
                                </tr>
                                <?php $current_department = $staff['Department']['name']; ?>
                            <?php endif; ?>
                            <tr id="program-<?php echo h($staff['Staff']['id']); ?>">
                                <td><?php echo $i++; ?>&nbsp;</td>
                                <td><?php echo $staff['Staff']['name']; ?>&nbsp;</td>
                                <td> <?php echo $staff['Position']['name']; ?>&nbsp;</td>                                
                                <td class="text-info"><strong><?php echo h($staff['Staff']['phone']); ?>&nbsp;</strong></td>                                
                                <td class="actions">
                                    <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe120;"></span>'), array('action' => 'moveup', $staff['Staff']['id'], $staff['Staff']['parent_id']), array('data-placement' => 'top', 'data-original-title' => 'Move Up', 'escape' => FALSE)); ?> 
                                    <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe124;"></span>'), array('action' => 'movedown', $staff['Staff']['id'], $staff['Staff']['parent_id']), array('data-placement' => 'top', 'data-original-title' => 'Move Down', 'escape' => FALSE)); ?>                             
                                    <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span>'), array('action' => 'view', $staff['Staff']['id']), array('data-placement' => 'top', 'data-original-title' => 'View', 'escape' => FALSE)); ?>   
                                    <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span>'), array('action' => 'edit', $staff['Staff']['id']), array('data-placement' => 'top', 'data-original-title' => 'Edit', 'escape' => FALSE)); ?>                                    
                                    <?php echo $this->Form->postLink(__('<span class="fs1" aria-hidden="true" data-icon="&#xe0a8;"></span>'), array('action' => 'delete', $staff['Staff']['id']), array('data-placement' => 'top', 'data-original-title' => 'Delete', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $staff['Staff']['id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Employees Details with Scrollbar
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
                                <?php foreach ($staffs_array as $staff): ?>
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
<div class="row-fluid">
    <div class="span12">
        <div class="widget no-margin">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Clients List
                </div>
            </div>
            <div class="widget-body">
                <div id="demoFour-nav" class="listNav">
                    <div class="ln-letter-count">11</div>
                </div>
                <ul id="demoFour" class="demo">
                    <?php foreach ($staffs_array as $staff): ?>
                        <li class="ln-<?php echo substr($staff['Staff']['name'], 0, 1); ?>">
                            <?php echo $this->Html->link(($staff['Staff']['name']), array('action' => 'view', $staff['Staff']['id'])); ?> 
                        </li>
                    <?php endforeach; ?>                               
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
