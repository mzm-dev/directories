<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Positions'); ?>                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Add New Position'), array('action' => 'add'), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Add New Position', 'escape' => FALSE)); ?>

                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>
                        <th class="span1"><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th class="span3"><?php echo $this->Paginator->sort('created'); ?></th>
                        <th class="span3"><?php echo $this->Paginator->sort('modified'); ?></th>
                        <th class="span2"><?php echo __('Actions'); ?></th>
                    </tr>
                    <?php foreach ($positions as $position): ?>
                        <tr>
                            <td><?php echo h($position['Position']['id']); ?>&nbsp;</td>
                            <td><?php echo h($position['Position']['name']); ?>&nbsp;</td>
                            <td><?php echo h($position['Position']['created']); ?>&nbsp;</td>
                            <td><?php echo h($position['Position']['modified']); ?>&nbsp;</td>
                            <td class="actions">
                               <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span>'), array('action' => 'view', $position['Position']['id']), array('data-placement' => 'top', 'data-original-title' => 'View', 'escape' => FALSE)); ?>   
                                <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span>'), array('action' => 'edit', $position['Position']['id']), array('data-placement' => 'top', 'data-original-title' => 'Edit', 'escape' => FALSE)); ?>
                                <?php echo $this->Form->postLink(__('<span class="fs1" aria-hidden="true" data-icon="&#xe0a8;"></span>'), array('action' => 'delete', $position['Position']['id']), array('data-placement' => 'top', 'data-original-title' => 'Delete', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $position['Position']['id'])); ?>
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
                        ?>
                    </ul>
                </div><!-- .pagination -->
            </div>
        </div>
    </div>
</div>