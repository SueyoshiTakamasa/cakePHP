<div class="admins form">
<!-- <ol class="breadcrumb">
        <li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Admin'), array('action' => 'index'), array('escape' => false)); ?></li>
                <li class="active">『<?php echo h($this->request->data['Admin']['name']); ?>』の<?php echo __('Edit'); ?></li>
            </ol> -->
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
                    <td colspan="9" >
                        <div class=" ">
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
                    <td colspan="9" >
                        <div class="photo-column ">
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
                    <td colspan="9" >
                        <div class=" col-xs-12">
                                                    <div class="col-xs-12 ">
                                                                   <div id="date" class="input-group">
                                        <!--                                         <?php echo $this->Form->input("Admin.birthday", [
                                            'class' => 'form-control', 
                                            'error' => false, 
                                            'type' => 'text', 
                                            'div' => false, 
                                            'label' => false, 
                                            'required' => false, 
                                            'readonly' => false, 
                                            'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
                                        ]);?> -->
                                    </div>
                                    <?php echo $this->Form->error("Admin.birthday"); ?>
                                                           </div>
                        </div>
                    </td>
                </tr>
                                                                                <tr>
                    <th colspan="3" class="align-middle"><?php echo __('Comment') ?><span class="require"></span></th>
                    <td colspan="9" >
                        <div class=" ">
                                                    <div class="col-xs-12 ">
                                                                                                       <?php echo $this->Form->input("Admin.comment", [
                                        'type' => 'textarea', 
                                        'class' => 'form-control', 
                                        'label' => false, 
                                        'required' => false, 
                                        'rows' => '2', 
                                    ]); ?>                                                           </div>
                        </div>
                    </td>
                </tr>
                                                                                                                                                                                <tr>
                    <th colspan="3" class="align-middle"><?php echo __('Shop Id') ?><span class="require"></span></th>
                    <td colspan="9" >
                        <div class=" ">
                                                    <div class="col-xs-12 form-inline">
                                                                                                                                 <?php echo $this->Form->input("Admin.shop_id", array(
                                    'type' => 'select', 
                                    'class' => 'form-control', 
                                    'label' => false, 
                                    'required' => false, 
                                    'options' => $shops, 
                                    'empty' => '▼選択',
                                ));?>                                                           </div>
                        </div>
                    </td>
                </tr>
                                                                                                                                <tr>
                    <th colspan="3" class="align-middle"><?php echo __('Employment Type') ?><span class="require"></span></th>
                    <td colspan="9" >
                        <div class=" ">
                                                    <div class="col-xs-12 form-inline">
                                                                                                   <?php echo $this->Form->input("Admin.employment_type", [
                                    'type'      => 'radio',
                                    'class'     => 'form-control', 
                                    'required'    => false,
                                    'legend'    => false,
                                    'options'   => $employment_type,
                                ]);
                                ?> 
                                                           </div>
                        </div>
                    </td>
                </tr>
                                                                                <tr>
                    <th colspan="3"><?php echo __('Paymenttype') ?></th>
                    <td colspan="9">
                            <div class="col-xs-12">
                                <div class="form-inline">
                                <?php echo $this->Form->input("Admin.Paymenttype", 
                                    array(
                                        'type'     => 'select',
                                        'multiple' => 'checkbox',
                                        'label'    => false,
                                        'error'    => false,
                                    )
                                ); 
                                ?>
                                </div>
                            </div>
                    </td>
                </tr>
                                            </table>
            <div class="form-group text-center action-btns">
                                <?php echo $this->Form->submit(__('Update'), array('class' => 'btn btn-success btn-md', 'div' => false , 'id' => 'submit')); ?>
                            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>
