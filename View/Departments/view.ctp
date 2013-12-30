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
                        <td><strong><?php echo __('Id'); ?></strong></td>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Related '); ?>                </div>                                
            </div>
            <div class="widget-body">
                <?php if (!empty($department['Staff'])): ?>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Position Id'); ?></th>
                            <th><?php echo __('Department Id'); ?></th>
                            <th><?php echo __('Parent Id'); ?></th>
                            <th><?php echo __('Lft'); ?></th>
                            <th><?php echo __('Rght'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Email'); ?></th>
                            <th><?php echo __('Ext'); ?></th>
                            <th><?php echo __('Telhp'); ?></th>
                            <th><?php echo __('Avctive'); ?></th>
                            <th><?php echo __('Created'); ?></th>
                            <th><?php echo __('Modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($department['Staff'] as $staff):
                            ?>
                            <tr>
                                <td><?php echo $staff['id']; ?></td>
                                <td><?php echo $staff['position_id']; ?></td>
                                <td><?php echo $staff['department_id']; ?></td>
                                <td><?php echo $staff['parent_id']; ?></td>
                                <td><?php echo $staff['lft']; ?></td>
                                <td><?php echo $staff['rght']; ?></td>
                                <td><?php echo $staff['name']; ?></td>
                                <td><?php echo $staff['email']; ?></td>
                                <td><?php echo $staff['ext']; ?></td>
                                <td><?php echo $staff['telhp']; ?></td>
                                <td><?php echo $staff['avctive']; ?></td>
                                <td><?php echo $staff['created']; ?></td>
                                <td><?php echo $staff['modified']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('controller' => 'staffs', 'action' => 'view', $staff['id']), array('class' => 'btn btn-mini')); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('controller' => 'staffs', 'action' => 'edit', $staff['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'staffs', 'action' => 'delete', $staff['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $staff['id'])); ?>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                    </table>
<?php endif; ?>

                <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Staff'), array('controller' => 'staffs', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div>
            </div>
        </div>
    </div>
</div>