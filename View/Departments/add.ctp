<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14b;"></span><?php echo __('Add Department'); ?>                </div>                
            </div>
            <div class="widget-body" id="departments-form">
                <?php
                echo $this->Form->create('Department', array('novalidate',
                    'class' => 'form-horizontal no-margin',
                    'inputDefaults' => array(
                        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                        'div' => array('class' => 'control-group'),
                        'label' => array('class' => 'control-label'),
                        'between' => '<div class="controls">',
                        'after' => '</div>', 'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')))));

                echo $this->Form->input('name', array(
                    'label' => array('class' => 'control-label', 'text' => 'Name'),
                    'placeholder' => 'Name of Department',
                    'class' => 'span6'));
                ?>
                <div class="form-actions no-margin">
                    <?php echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'btn btn-info')); ?>
                    <?php echo $this->Form->end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>