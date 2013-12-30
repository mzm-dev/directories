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
                        <?php echo "<?php echo \$this->Html->link(('Edit " . $singularHumanName . "'), array('action' => 'edit'), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Edit " . $singularHumanName . "', 'escape' => FALSE)); ?>\n" ?>                        
                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered">
                    <?php
                    foreach ($fields as $field) {
                        $isKey = false;
                        if (!empty($associations['belongsTo'])) {
                            foreach ($associations['belongsTo'] as $alias => $details) {
                                if ($field === $details['foreignKey']) {
                                    $isKey = true;
                                    echo "<tr>\n";
                                    echo "\t\t<td><strong><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></strong></td>\n";
                                    echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => '')); ?>\n\t\t\t&nbsp;\n\t\t</td>\n";
                                    echo "</tr>\n";
                                    break;
                                }
                            }
                        }
                        if ($isKey !== true) {
                            echo "<tr>\n";
                            echo "\t\t<td><strong><?php echo __('" . Inflector::humanize($field) . "'); ?></strong></td>\n";
                            echo "\t\t<td>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</td>\n";
                            echo "</tr>\n";
                        }
                    }
                    ?>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?>
                </div>                                
            </div>
            <div class="widget-body">
                <?php
                if (!empty($associations['hasOne'])) :
                    foreach ($associations['hasOne'] as $alias => $details):
                        ?>                                    
                        <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
                        <table class="table table-striped table-bordered">
                            <?php
                            foreach ($details['fields'] as $field) {
                                echo "<tr>";
                                echo "\t\t<td><strong><?php echo __('" . Inflector::humanize($field) . "'); ?></strong></td>\n";
                                echo "\t\t<td><strong><?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</strong></td>\n";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                        <?php echo "<?php endif; ?>\n"; ?>
                        <div class="actions">
                            <?php echo "<li><?php echo \$this->Html->link(__('<i class=\"icon-pencil icon-white\"></i> Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => 'btn btn-primary', 'escape' => false)); ?>\n"; ?>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
                <?php
                if (empty($associations['hasMany'])) {
                    $associations['hasMany'] = array();
                }
                if (empty($associations['hasAndBelongsToMany'])) {
                    $associations['hasAndBelongsToMany'] = array();
                }
                $relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
                $i = 0;
                foreach ($relations as $alias => $details):
                    $otherSingularVar = Inflector::variable($alias);
                    $otherPluralHumanName = Inflector::humanize($details['controller']);
                    ?>
                    <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <?php
                            foreach ($details['fields'] as $field) {
                                echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
                            }
                            ?>
                            <th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
                        </tr>
                        <?php
                        echo "\t<?php
								\$i = 0;
								foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
                        echo "\t\t<tr>\n";
                        foreach ($details['fields'] as $field) {
                            echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
                        }

                        echo "\t\t\t<td class=\"actions\">\n";
                        echo "\t\t\t\t<?php echo \$this->Html->link(__('View'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini')); ?>\n";
                        echo "\t\t\t\t<?php echo \$this->Html->link(__('Edit'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini')); ?>\n";
                        echo "\t\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
                        echo "\t\t\t</td>\n";
                        echo "\t\t</tr>\n";

                        echo "\t<?php endforeach; ?>\n";
                        ?>
                    </table>
                    <?php echo "<?php endif; ?>\n\n"; ?>
                    <div class="actions">
                        <?php echo "<?php echo \$this->Html->link('<i class=\"icon-plus icon-white\"></i> '.__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>"; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>