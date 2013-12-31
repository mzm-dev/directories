<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Departments'); ?>                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Edit Department'), array('action' => 'edit', $department['Department']['id']), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Edit Department', 'escape' => FALSE)); ?>

                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td class="span2"><strong><?php echo __('Id'); ?></strong></td>
                        <td>
                            <?php echo h($department['Department']['id']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Name'); ?></strong></td>
                        <td>
                            <?php echo h($department['Department']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Created'); ?></strong></td>
                        <td>
                            <?php echo h($department['Department']['created']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Modified'); ?></strong></td>
                        <td>
                            <?php echo h($department['Department']['modified']); ?>
                            &nbsp;
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>
<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Related '); ?>                    
                </div>
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add'), array('data-placement' => 'top', 'data-original-title' => 'Add Staff', 'class' => 'btn btn-primary', 'escape' => false)); ?>

                    </div>
                </div>
            </div>
            <div class="widget-body">
                <?php if (!empty($department['Staff'])): ?>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th class="span1"><?php echo __('Id'); ?></th>
                            <th><?php echo __('Name'); ?></th>                                                        
                            <th class="span3"><?php echo __('Created'); ?></th>
                            <th class="span3"><?php echo __('Modified'); ?></th>
                            <th class="span2"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($department['Staff'] as $staff):
                            ?>
                            <tr>
                                <td><?php echo $staff['id']; ?></td>
                                <td><?php echo $staff['name']; ?></td>                                                                
                                <td><?php echo $staff['modified']; ?></td>
                                <td><?php echo $staff['created']; ?></td>
                                <td class="actions">                                
                                    <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span>'), array('controller' => 'staffs', 'action' => 'view', $staff['id']), array('data-placement' => 'top', 'data-original-title' => 'View', 'escape' => FALSE)); ?>   
                                    <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span>'), array('controller' => 'staffs', 'action' => 'edit', $staff['id']), array('data-placement' => 'top', 'data-original-title' => 'Edit', 'escape' => FALSE)); ?>                                    
                                    <?php echo $this->Form->postLink(__('<span class="fs1" aria-hidden="true" data-icon="&#xe0a8;"></span>'), array('controller' => 'staffs', 'action' => 'delete', $staff['id']), array('data-placement' => 'top', 'data-original-title' => 'Delete', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $staff['id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <div class="alert alert-block alert-warning">No Releted Staff</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>