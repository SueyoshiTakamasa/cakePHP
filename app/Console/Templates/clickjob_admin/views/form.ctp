<div class="<?php echo $pluralVar; ?> form">
    <ol class="breadcrumb">
        <li><?php echo "<?php echo \$this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display'), array('escape' => false)); ?>"; ?></li>
        <li><?php echo "<?php echo \$this->Html->link(__('{$singularHumanName}'), array('action' => 'index'), array('escape' => false)); ?>" ?></li>
        <?php if (strpos($action, 'add') === false): ?>
        <li class="active">『<?php echo "<?php echo h(\$this->request->data['{$modelClass}']['name']); ?>"; ?>』の<?php echo "<?php echo __('Edit'); ?>"; ?></li>
        <?php else: ?>
        <li class="active"><?php echo "<?php echo __('Add'); ?>"; ?></li>
        <?php endif; ?>
    </ol>

    <div class="row">
        <div class="form-group">
            <div class="container text-right action-btns">
                <?php echo "<?php echo \$this->Html->link(__('<span class=\"btn btn-warning btn-md\"><span class=\"glyphicon glyphicon-th-list\"></span>&nbsp;' . __(\"{$modelClass}\").__(\"List\") . '</span>'), array('action' => 'index'), array('escape' => false)); ?>\n"; ?>
            </div>
        </div>

        <div class="col-md-12">
            <?php echo "<?php echo \$this->Form->create('', array('role' => 'form', 'type' => 'file')); ?>\n"; ?>
            <table cellpadding="0" cellspacing="0" class="table table-bordered horizontal-form">
                <?php if (strpos($action, 'add') === false): ?>
                <?php echo "<?php echo \$this->Form->hidden(\"{$modelClass}.id\", array('class' => 'form-control', 'label' => false, 'required' => false));?>\n"; ?>
                <?php endif; ?>
                <?php foreach ($fields as $field): ?>
                <?php $isDateField = isset($schema[$field]['type']) && $schema[$field]['type'] == 'datetime';?>
                <?php if (!in_array($field, array('created', 'updated', 'deleted', 'id', 'photo_dir'))): ?>
                <tr>
                    <th colspan="3"><?php echo "<?php echo __('" .Inflector::humanize($field). "') ?>"; ?><span class="require"></span></th>
                    <td colspan="9">
                        <div class="row <?php echo $field == 'photo' ? 'photo-column' : ''; ?> <?php echo $isDateField ? 'col-xs-12' : ''; ?>">
                        <?php $formInline = strpos($field, '_id') > 0 || strpos($field, '_type'); ?>
                            <div class="col-xs-12 <?php if ($formInline)echo 'form-inline'; ?>">
                               <?php if (strpos($field, '_id')): ?>
                               <?php $options = $this->_pluralName(str_replace('_id','',$field)); ?>
                                   <?php echo <<<PHP
                                <?php echo \$this->Form->input("{$modelClass}.{$field}", array(
                                    'type' => 'select', 
                                    'class' => 'form-control', 
                                    'label' => false, 
                                    'required' => false, 
                                    'options' => \${$options}, 
                                    'empty' => '▼選択',
                                ));?>
PHP
; ?>
                               <?php elseif (strpos($field, '_type')): ?>
                                    <?php echo <<<PHP
                                <?php echo \$this->Form->input("{$modelClass}.{$field}", [
                                    'type'      => 'radio',
                                    'class'     => 'form-control', 
                                    'required'    => false,
                                    'legend'    => false,
                                    'options'   => \${$field},
                                ]); ?>
PHP
; ?> 
                               <?php elseif (strpos($field, '_flg')): ?>
                               <?php $label = Inflector::humanize($field); ?>
                               <?php echo <<<PHP
                                <?php echo \$this->Form->input("{$modelClass}.{$field}", [
                                    'class' => 'form', 
                                    'placeholder' => false, 
                                    'label' => __('{$label}'),
                                ]); ?>
PHP
; ?>
                               <?php elseif ($isDateField): ?>
                                    <div class="input-group date datetimepicker">
                                        <?php echo <<<PHP
                                        <?php echo \$this->Form->input("{$modelClass}.{$field}", [
                                            'class' => 'form-control', 
                                            'error' => false, 
                                            'type' => 'text', 
                                            'div' => false, 
                                            'label' => false, 
                                            'required' => false, 
                                            'readonly' => false, 
                                            'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
                                        ]);?>
PHP
; ?>
                                    </div>
                                    <?php echo "<?php echo \$this->Form->error(\"{$modelClass}.{$field}\"); ?>\n"; ?>
                               <?php elseif ($field == 'birthday'): ?>
                                    <div class="form-inline">
                                        <?php echo "<?php echo \$this->Form->input(\"{$modelClass}.{$field}\", array('monthNames' => false, 'class' => 'form-control', 'required' => false, 'div' => false, 'dateFormat' => 'YMD', 'minYear' => 1900, 'maxYear' => date('Y') - 18, 'label' => false, 'style' => 'width: 28%;', 'selected' => array('year' => NULL, 'month' => NULL, 'day' => NULL), 'empty' => array('' => '')));?>\n"; ?>
                                    </div>
                               <?php elseif ($field == 'photo'): ?>
                                    <div>
                                        <?php echo "<?php echo \$this->Form->input(\"{$modelClass}.{$field}\", array('type' => 'file', 'class' => 'form-control', 'style' => 'display: none;', 'required' => false, 'label' => false, 'placeholder' => __('" .Inflector::humanize($field). "')));?>\n"; ?>
                                    </div>
                                    <?php echo "<?php echo \$this->Form->hidden(\"{$modelClass}.{$field}_dir\", array('type' => 'file', 'class' => 'form-control'));?>\n"; ?>
                                    <div class="input-group dummy-choice">
                                        <?php echo "<?php echo \$this->Form->input(\"{$modelClass}.dummy_file\", array('type' => 'text', 'class' => 'form-control', 'disabled' => 'disabled', 'required' => false, 'id' => 'dummy-file', 'label' => false, 'placeholder' => __('右のボタンより画像ファイルを選択して下さい')));?>\n"; ?>
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
                                   <?php elseif (
                                       $field == 'comment' ||
                                       $field == 'description' || 
                                       $field == 'question' ||
                                       $field == 'contents' ||
                                       (isset($schema[$field]['type'], $schema[$field]['length'])
                                       && $schema[$field]['type'] === 'string'
                                       && $schema[$field]['length'] >= 400
                                       )
                                   ): ?>
                                    <?php echo <<<PHP
                                    <?php echo \$this->Form->input("{$modelClass}.{$field}", [
                                        'type' => 'textarea', 
                                        'class' => 'form-control', 
                                        'label' => false, 
                                        'required' => false, 
                                        'rows' => '2', 
                                    ]); ?>
PHP
; ?>
                               <?php else: ?>
                                    <?php echo <<<PHP
                                    <?php echo \$this->Form->input("{$modelClass}.{$field}", [
                                        'type' => 'text',
                                        'class' => 'form-control', 
                                        'label' => false, 
                                        'required' => false, 
                                        'div' => false,
                                    ]); ?>
PHP
; ?>
                               <?php endif; ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php if (!empty($associations['hasAndBelongsToMany'])): ?>
                <?php foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData): ?>
                <tr>
                    <th><?php echo "<?php echo __('" .$assocName. "') ?>"; ?></th>
                    <td>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-inline">
                                <?php echo "<?php echo \$this->Form->input(\"{$modelClass}.{$assocName}\","; ?> 
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
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
            <div class="form-group text-center action-btns">
                <?php if (strpos($action, 'add') === false): ?>
                <?php echo "<?php echo \$this->Form->submit(__('Update'), array('class' => 'btn btn-success btn-md', 'div' => false)); ?>\n"; ?>
                <?php else: ?>
                <?php echo "<?php echo \$this->Form->submit(__('Create'), array('class' => 'btn btn-primary btn-md', 'div' => false)); ?>\n"; ?>
                <?php endif; ?>
            </div>
            <?php echo "<?php echo \$this->Form->end() ?>\n"; ?>
        </div>
    </div>
</div>
