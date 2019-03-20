<div class="admins form  col-md-10 bg-light">
<ol class="breadcrumb bg-white">
        <li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Admin'), array('action' => 'index'), array('escape' => false)); ?></li>
                <li class="active">『<?php echo h($this->request->data['Admin']['name']); ?>』の<?php echo __('Edit'); ?></li>
            </ol>
    <div class="row">
<!--         <div class="form-group">
            <div class="col-md-12 text-right action-btns">
                <?php echo $this->Html->link(__('<span class="btn btn-warning btn-md"><span class="glyphicon glyphicon-th-list"></span>&nbsp;' . __("Admin").__("List") . '</span>'), array('action' => 'index'), array('escape' => false)); ?>
            </div>
        </div> -->

        <div class="col-md-12">
            <?php echo $this->Form->create('', array('role' => 'form', 'type' => 'file')); ?>
            <table cellpadding="0" cellspacing="0" class="table table-bordered bg-white horizontal-form">
                                <?php echo $this->Form->hidden("Admin.id", array('class' => 'form-control', 'label' => false, 'required' => false));?>
                                                                                                                                <tr>
                    <th colspan="3" class="align-middle"><?php echo __('Name') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row  ">
                                                    <div class="col-xs-12 ">
                                                                                                       <?php echo $this->Form->input("Admin.name", [
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
                    <th colspan="3" class="align-middle"><?php echo __('Photo') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row photo-column ">
                                                    <div class="col-xs-12 ">
                                                                   <div>
                                        <?php echo $this->Form->input("Admin.photo", array('type' => 'file', 'class' => 'form-control', 'style' => 'display: none;', 'required' => false, 'label' => false, 'placeholder' => __('Photo')));?>
                                    </div>
                                    <?php echo $this->Form->hidden("Admin.photo_dir", array('type' => 'file', 'class' => 'form-control'));?>
                                    <div class="input-group dummy-choice">
                                        <?php echo $this->Form->input("Admin.dummy_file", array('type' => 'text', 'class' => 'form-control', 'disabled' => 'disabled', 'required' => false, 'id' => 'dummy-file', 'label' => false, 'placeholder' => __('右のボタンより画像ファイルを選択して下さい')));?>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" id="dummy-btn">
                                                <span class="glyphicon glyphicon-folder-open"></span>&nbsp;ファイルアップロード
                                            </button>
                                            <button class="btn btn-warning" type="button" id="cancel-btn">
                                                <span class="glyphicon glyphicon-remove"></span>&nbsp;キャンセル
                                            </button>
                                        </span>
                                    </div>
                                    <div id="photoUpload">
                                    </div>
                                                               </div>
                        </div>
                    </td>
                </tr>
                                                                                <tr>
                    <th colspan="3" class="align-middle"><?php echo __('Birthday') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row  col-xs-12">
                                                    <div class="col-xs-12 ">
                                                                   <div class="input-group date datetimepicker">
                                                                                <?php echo $this->Form->input("Admin.birthday", [
                                            'class' => 'form-control', 
                                            'error' => false, 
                                            'type' => 'text', 
                                            'div' => false, 
                                            'label' => false, 
                                            'required' => false, 
                                            'readonly' => false, 
                                            'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
                                        ]);?>                                    </div>
                                    <?php echo $this->Form->error("Admin.birthday"); ?>
                                                           </div>
                        </div>
                    </td>
                </tr>
                                                                                <tr>
                    <th colspan="3" class="align-middle"><?php echo __('Body') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row  ">
                                                    <div class="col-xs-12 ">
                                                                                                       <?php echo $this->Form->input("Admin.body", [
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
                    <th colspan="3" class="align-middle"><?php echo __('Modified') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row  col-xs-12">
                                                    <div class="col-xs-12 ">
                                                                   <div class="input-group date datetimepicker">
                                                                                <?php echo $this->Form->input("Admin.modified", [
                                            'class' => 'form-control', 
                                            'error' => false, 
                                            'type' => 'text', 
                                            'div' => false, 
                                            'label' => false, 
                                            'required' => false, 
                                            'readonly' => false, 
                                            'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
                                        ]);?>                                    </div>
                                    <?php echo $this->Form->error("Admin.modified"); ?>
                                                           </div>
                        </div>
                    </td>
                </tr>
                                                                                                                                <tr>
                    <th colspan="3" class="align-middle"><?php echo __('Deleted Time') ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row  col-xs-12">
                                                    <div class="col-xs-12 ">
                                                                   <div class="input-group date datetimepicker">
                                                                                <?php echo $this->Form->input("Admin.deleted_time", [
                                            'class' => 'form-control', 
                                            'error' => false, 
                                            'type' => 'text', 
                                            'div' => false, 
                                            'label' => false, 
                                            'required' => false, 
                                            'readonly' => false, 
                                            'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
                                        ]);?>                                    </div>
                                    <?php echo $this->Form->error("Admin.deleted_time"); ?>
                                                           </div>
                        </div>
                    </td>
                </tr>
                                                            </table>
            <div class="form-group text-center action-btns">
                                <?php echo $this->Form->submit(__('Update'), array('class' => 'btn btn-success btn-md', 'div' => false)); ?>
                            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>
