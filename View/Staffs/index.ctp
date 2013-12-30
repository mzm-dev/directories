<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Staffs'); ?>                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Add New Staff'), array('action' => 'add'), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Add New Staff', 'escape' => FALSE)); ?>

                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('position_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('department_id'); ?></th>                        
                        <th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th><?php echo $this->Paginator->sort('email'); ?></th>
                        <th><?php echo $this->Paginator->sort('ext'); ?></th>
                        <th><?php echo $this->Paginator->sort('telhp'); ?></th>                        
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified'); ?></th>
                        <th><?php echo $this->Paginator->sort('active'); ?></th>
                        <th class="span2"><?php echo __('Actions'); ?></th>
                    </tr>
                    <?php foreach ($staffs as $staff): ?>
                        <tr>
                            <td><?php echo h($staff['Staff']['id']); ?>&nbsp;</td>
                            <td>
                                <?php echo $this->Html->link($staff['Position']['name'], array('controller' => 'positions', 'action' => 'view', $staff['Position']['id'])); ?>
                            </td>
                            <td>
                                <?php echo $this->Html->link($staff['Department']['name'], array('controller' => 'departments', 'action' => 'view', $staff['Department']['id'])); ?>
                            </td>                                                        
                            <td><?php echo h($staff['Staff']['name']); ?>&nbsp;</td>
                            <td><?php echo h($staff['Staff']['email']); ?>&nbsp;</td>
                            <td><?php echo h($staff['Staff']['ext']); ?>&nbsp;</td>
                            <td><?php echo h($staff['Staff']['telhp']); ?>&nbsp;</td>                            
                            <td><?php echo h($staff['Staff']['created']); ?>&nbsp;</td>
                            <td><?php echo h($staff['Staff']['modified']); ?>&nbsp;</td>
                            <td><?php echo h($staff['Staff']['active']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $staff['Staff']['id'])); ?>
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $staff['Staff']['id'])); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $staff['Staff']['id']), null, __('Are you sure you want to delete # %s?', $staff['Staff']['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>               
                <p><small>
                        <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                        ));
                        ?>                    </small></p>

                <div class="pagination">
                    <ul>
                        <?php
                        echo ($this->Paginator->current() > 3) ? $this->Paginator->first('first ', array('tag' => 'li')) : '';
                        echo ($this->Paginator->hasPrev()) ? $this->Paginator->prev(__('prev ', true), array('tag' => 'li', 'id' => 'prev' . rand(2, 9000)), null, array('escape' => false)) : '';
                        echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li'));
                        echo ($this->Paginator->hasNext()) ? $this->Paginator->next(__(' next', true), array('tag' => 'li'), null, array('escape' => false)) : '';
                        echo ((int) $this->Paginator->counter(array('format' => '%pages%')) > 10) ? $this->Paginator->last('last', array('tag' => 'li')) : '';
                        echo $this->Js->writeBuffer();
                        ?>                    </ul>
                </div><!-- .pagination -->
            </div>
        </div>
    </div>
</div>