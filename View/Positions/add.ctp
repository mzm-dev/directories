<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14b;"></span><?php echo __('Add Position'); ?>                </div>                
            </div>
            <div class="widget-body" id="positions-form">
                <?php
                echo $this->Form->create('Position', array('novalidate',
                    'class' => 'form-horizontal no-margin',
                    'inputDefaults' => array(
                        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                        'div' => array('class' => 'control-group'),
                        'label' => array('class' => 'control-label'),
                        'between' => '<div class="controls">',
                        'after' => '</div>', 'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')))));

                echo $this->Form->input('name', array(
                    'label' => array('class' => 'control-label', 'text' => 'Name'),
                    'placeholder' => 'Name of Position',
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