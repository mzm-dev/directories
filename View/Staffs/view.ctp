<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Staffs'); ?>                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Edit Staff'), array('action' => 'edit',$staff['Staff']['id']), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Edit Staff', 'escape' => FALSE)); ?>

                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td><strong><?php echo __('Id'); ?></strong></td>
                        <td>
                            <?php echo h($staff['Staff']['id']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Position'); ?></strong></td>
                        <td>
                            <?php echo $this->Html->link($staff['Position']['name'], array('controller' => 'positions', 'action' => 'view', $staff['Position']['id']), array('class' => '')); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Department'); ?></strong></td>
                        <td>
                            <?php echo $this->Html->link($staff['Department']['name'], array('controller' => 'departments', 'action' => 'view', $staff['Department']['id']), array('class' => '')); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Parent Staff'); ?></strong></td>
                        <td>
                            <?php echo $this->Html->link($staff['ParentStaff']['name'], array('controller' => 'staffs', 'action' => 'view', $staff['ParentStaff']['id']), array('class' => '')); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Lft'); ?></strong></td>
                        <td>
                            <?php echo h($staff['Staff']['lft']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Rght'); ?></strong></td>
                        <td>
                            <?php echo h($staff['Staff']['rght']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Name'); ?></strong></td>
                        <td>
                            <?php echo h($staff['Staff']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Email'); ?></strong></td>
                        <td>
                            <?php echo h($staff['Staff']['email']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Ext'); ?></strong></td>
                        <td>
                            <?php echo h($staff['Staff']['ext']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Telhp'); ?></strong></td>
                        <td>
                            <?php echo h($staff['Staff']['telhp']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Avctive'); ?></strong></td>
                        <td>
                            <?php echo h($staff['Staff']['avctive']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Created'); ?></strong></td>
                        <td>
                            <?php echo h($staff['Staff']['created']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Modified'); ?></strong></td>
                        <td>
                            <?php echo h($staff['Staff']['modified']); ?>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Related Staffs'); ?>                </div>                                
            </div>
            <div class="widget-body">
                <?php if (!empty($staff['ChildStaff'])): ?>
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
                        foreach ($staff['ChildStaff'] as $childStaff):
                            ?>
                            <tr>
                                <td><?php echo $childStaff['id']; ?></td>
                                <td><?php echo $childStaff['position_id']; ?></td>
                                <td><?php echo $childStaff['department_id']; ?></td>
                                <td><?php echo $childStaff['parent_id']; ?></td>
                                <td><?php echo $childStaff['lft']; ?></td>
                                <td><?php echo $childStaff['rght']; ?></td>
                                <td><?php echo $childStaff['name']; ?></td>
                                <td><?php echo $childStaff['email']; ?></td>
                                <td><?php echo $childStaff['ext']; ?></td>
                                <td><?php echo $childStaff['telhp']; ?></td>
                                <td><?php echo $childStaff['avctive']; ?></td>
                                <td><?php echo $childStaff['created']; ?></td>
                                <td><?php echo $childStaff['modified']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('controller' => 'staffs', 'action' => 'view', $childStaff['id']), array('class' => 'btn btn-mini')); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('controller' => 'staffs', 'action' => 'edit', $childStaff['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'staffs', 'action' => 'delete', $childStaff['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $childStaff['id'])); ?>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                    </table>
<?php endif; ?>

                <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Child Staff'), array('controller' => 'staffs', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div>
            </div>
        </div>
    </div>
</div>