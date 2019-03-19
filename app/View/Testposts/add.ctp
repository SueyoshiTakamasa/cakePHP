<div class="testposts form">
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Testpost'), array('action' => 'index'), array('escape' => false)); ?></li>
                <li class="active"><?php echo __('Add'); ?></li>
            </ol>

    <div class="row">
        <div class="form-group">
            <div class="col-md-12 text-right action-btns">
                <?php echo $this->Html->link(__('<span class="btn btn-warning btn-md"><span class="glyphicon glyphicon-th-list"></span>&nbsp;' . __("Testpost").__("List") . '</span>'), array('action' => 'index'), array('escape' => false)); ?>
            </div>
        </div>

        <div class="col-md-12">
            <?php echo $this->Form->create('', array('role' => 'form', 'type' => 'file')); ?>
            <table cellpadding="0" cellspacing="0" class="table table-bordered horizontal-form">
                                                                                                                                <tr>
                    <th colspan="3"><?php echo __('Title') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row  ">
                                                    <div class="col-xs-12 ">
                                                                                                       <?php echo $this->Form->input("Testpost.title", [
                                        'type' => 'text',
                                        'class' => 'form-control', 
                                        'label' => false, 
                                        'required' => false, 
                                        'div' => false,
                                    ]); ?>                                                           </div>
                        </div>
                    </td>
                </tr>
                                                                                <tr>
                    <th colspan="3"><?php echo __('Body') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row  ">
                                                    <div class="col-xs-12 ">
                                                                                                       <?php echo $this->Form->input("Testpost.body", [
                                        'type' => 'text',
                                        'class' => 'form-control', 
                                        'label' => false, 
                                        'required' => false, 
                                        'div' => false,
                                    ]); ?>                                                           </div>
                        </div>
                    </td>
                </tr>
                                                                                                                                <tr>
                    <th colspan="3"><?php echo __('Modified') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row  col-xs-12">
                                                    <div class="col-xs-12 ">
                                                                   <div class="input-group date datetimepicker">
                                                                                <?php echo $this->Form->input("Testpost.modified", [
                                            'class' => 'form-control', 
                                            'error' => false, 
                                            'type' => 'text', 
                                            'div' => false, 
                                            'label' => false, 
                                            'required' => false, 
                                            'readonly' => false, 
                                            'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
                                        ]);?>                                    </div>
                                    <?php echo $this->Form->error("Testpost.modified"); ?>
                                                           </div>
                        </div>
                    </td>
                </tr>
                                                                                                                                <tr>
                    <th colspan="3"><?php echo __('Deleted Time') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row  col-xs-12">
                                                    <div class="col-xs-12 ">
                                                                   <div class="input-group date datetimepicker">
                                                                                <?php echo $this->Form->input("Testpost.deleted_time", [
                                            'class' => 'form-control', 
                                            'error' => false, 
                                            'type' => 'text', 
                                            'div' => false, 
                                            'label' => false, 
                                            'required' => false, 
                                            'readonly' => false, 
                                            'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
                                        ]);?>                                    </div>
                                    <?php echo $this->Form->error("Testpost.deleted_time"); ?>
                                                           </div>
                        </div>
                    </td>
                </tr>
                                                                                <tr>
                    <th colspan="3"><?php echo __('Name') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row  ">
                                                    <div class="col-xs-12 ">
                                                                                                       <?php echo $this->Form->input("Testpost.name", [
                                        'type' => 'text',
                                        'class' => 'form-control', 
                                        'label' => false, 
                                        'required' => false, 
                                        'div' => false,
                                    ]); ?>                                                           </div>
                        </div>
                    </td>
                </tr>
                                                            </table>
            <div class="form-group text-center action-btns">
                                <?php echo $this->Form->submit(__('Create'), array('class' => 'btn btn-primary btn-md', 'div' => false)); ?>
                            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>
