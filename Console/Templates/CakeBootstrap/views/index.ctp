<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 * 
 * @project       Sistem Pengurusan Surat - Jabatan Landskap Negara 
 * @author        Mohamad Zaki Mustafa <mohdzaki04@gmail.com>
 * @dept          Unit Data & Teknologi Maklumat <UDTM, JLN>
 */
?>
<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?>
                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo "<?php echo \$this->Html->link(('Add New " . $singularHumanName . "'), array('action' => 'add'), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Add New " . $singularHumanName . "', 'escape' => FALSE)); ?>\n" ?>                        
                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
                        <?php endforeach; ?>
                        <th class="span2"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
                    </tr>
                    <?php
                    echo "<?php ";                                                   
                    echo "foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                    echo "\t<tr>\n";
                    foreach ($fields as $field) {
                        $isKey = false;
                        if (!empty($associations['belongsTo'])) {
                            foreach ($associations['belongsTo'] as $alias => $details) {
                                if ($field === $details['foreignKey']) {
                                    $isKey = true;
                                    echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                                    break;
                                }
                            }
                        }
                        if ($isKey !== true) {
                            echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                        }
                    }

                                        echo "\t\t<td class=\"actions\">\n";
                                        echo "\t\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
                                        echo "\t\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
                                        echo "\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
                                        echo "\t\t</td>\n";
                    echo "\t</tr>\n";

                    echo "<?php endforeach; ?>\n";
                    ?>
                </table>               
                <p><small>
                        <?php echo "<?php
				echo \$this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>"; ?>
                    </small></p>

                <div class="pagination">
                    <ul>
                        <?php
                        echo "<?php\n";
                        echo "\t\techo (\$this->Paginator->current() > 3) ? \$this->Paginator->first('first ', array('tag' => 'li')) : '';\n";
                        echo "\t\techo (\$this->Paginator->hasPrev()) ? \$this->Paginator->prev(__('prev ', true), array('tag' => 'li', 'id' => 'prev' . rand(2, 9000)), null, array('escape' => false)) : '';\n";
                        echo "\t\techo \$this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li'));\n";
                        echo "\t\techo (\$this->Paginator->hasNext()) ? \$this->Paginator->next(__(' next', true), array('tag' => 'li'), null, array('escape' => false)) : '';\n";
                        echo "\t\techo ((int) \$this->Paginator->counter(array('format' => '%pages%')) > 10) ? \$this->Paginator->last('last', array('tag' => 'li')) : '';\n";
                        echo "\t\techo \$this->Js->writeBuffer();\n";                                               
                        ?>
                    </ul>
                </div><!-- .pagination -->
            </div>
        </div>
    </div>
</div>