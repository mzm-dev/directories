<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14b;"></span><?php echo __('Edit Staff'); ?>                </div>                
            </div>
            <div class="widget-body" id="staffs-form">
                <?php
                echo $this->Form->create('Staff', array(
                    'class' => 'form-horizontal no-margin',
                    'inputDefaults' => array(
                        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                        'div' => array('class' => 'control-group'),
                        'label' => array('class' => 'control-label'),
                        'between' => '<div class="controls">',
                        'after' => '</div>', 'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')))));

                echo $this->Form->input('id', array(
                    'label' => array('class' => 'control-label', 'text' => 'id'),
                    'placeholder' => 'id',
                    'class' => 'span6'));
                echo $this->Form->input('position_id', array(
                    'label' => array('class' => 'control-label', 'text' => 'position_id'),
                    'placeholder' => 'position_id',
                    'class' => 'span6'));
                echo $this->Form->input('department_id', array(
                    'label' => array('class' => 'control-label', 'text' => 'department_id'),
                    'placeholder' => 'department_id',
                    'class' => 'span6'));
                echo $this->Form->input('parent_id', array(
                    'label' => array('class' => 'control-label', 'text' => 'parent_id'),
                    'placeholder' => 'parent_id',
                    'class' => 'span6'));                
                echo $this->Form->input('name', array(
                    'label' => array('class' => 'control-label', 'text' => 'name'),
                    'placeholder' => 'name',
                    'class' => 'span6'));
                echo $this->Form->input('email', array(
                    'label' => array('class' => 'control-label', 'text' => 'email'),
                    'placeholder' => 'email',
                    'class' => 'span6'));                
                echo $this->Form->input('phone', array(
                    'label' => array('class' => 'control-label', 'text' => 'telhp'),
                    'placeholder' => 'telhp',
                    'class' => 'span6'));
                echo $this->Form->input('active', array(
                    'label' => array('class' => 'control-label', 'text' => 'active'),
                    'placeholder' => 'active'));
                ?>
                <div class="form-actions no-margin">
                    <?php echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'btn btn-info')); ?>
<?php echo $this->Form->end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>