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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14b;"></span><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?>
                </div>                
            </div>
            <div class="widget-body" id="<?php echo $pluralVar; ?>-form">
                <?php
                echo "<?php echo \$this->Form->create('{$modelClass}',array(\n";
                echo "\t'class' => 'form-horizontal no-margin',\n";
                echo "\t'inputDefaults' => array(\n";
                echo "\t\t'format' => array('before', 'label', 'between', 'input', 'error', 'after'),\n";
                echo "\t\t'div' => array('class' => 'control-group'),\n";
                echo "\t\t'label' => array('class' => 'control-label'),\n";
                echo "\t\t'between' => '<div class=\"controls\">',\n";
                echo "\t\t'after' => '</div>',";
                echo "\t\t'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')))));\n";
                ?>

                <?php
                foreach ($fields as $field) {
                    if (strpos($action, 'add') !== false && $field == $primaryKey) {
                        continue;
                    } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                        echo "echo \$this->Form->input('{$field}', array(\n";
                        echo "\t\t'label' => array('class' => 'control-label', 'text' => '{$field}'),\n";
                        echo "\t\t'placeholder' => '{$field}',\n";
                        echo "\t\t'class' => 'span6'));\n";                     
                    }
                }
                if (!empty($associations['hasAndBelongsToMany'])) {
                    foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                        echo "echo \$this->Form->input('{$assocName}', array(\n";
                        echo "\t\t'label' => array('class' => 'control-label', 'text' => Pilih '{$field}'),\n";
                        echo "\t\t'class' => 'span6', 'empty' => 'Sila Pilih')); ?>\n";
                        echo "\t));\n";
                    }
                }
                ?>
                <?php echo "?>\n" ?>
                <div class="form-actions no-margin">
                    <?php echo "<?php echo \$this->Form->button('Daftar', array('type' => 'submit', 'class' => 'btn btn-info')); ?>\n"; ?>
                    <?php echo "<?php echo \$this->Form->end(); ?>\n"; ?>   
                </div>
            </div>
        </div>
    </div>
</div>