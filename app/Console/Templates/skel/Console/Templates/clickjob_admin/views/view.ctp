<div class="<?php echo $pluralVar; ?> view">
    <ol class="breadcrumb">
        <li><?php echo "<?php echo \$this->Html->link(__('Home'), '/', array('escape' => false)); ?>"; ?></li>
        <li><?php echo "<?php echo \$this->Html->link(__('{$singularHumanName}'), array('action' => 'index'), array('escape' => false)); ?>" ?></li>
        <li class="active">『<?php echo "<?php echo h(\${$singularVar}['{$modelClass}']['name']); ?>"; ?>』の<?php echo "<?php echo __('View'); ?>"; ?></li>
    </ol>

    <div class="row">
        <div class="form-group text-right">
            <div class="col-md-12">			
            <?php echo "<?php echo \$this->Html->link(__('<span class=\"btn btn-success btn-md\"><span class=\"glyphicon glyphicon-edit\"></span>&nbsp;' . __(\"Edit\") . '</span>'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false)); ?>\n"; ?>
            <?php echo "<?php echo \$this->Html->link(__('<span class=\"btn btn-warning btn-md\"><span class=\"glyphicon glyphicon-th-list\"></span>&nbsp;' . __(\"List\") . '</span>'), array('action' => 'index'), array('escape' => false)); ?>\n"; ?>
            <?php echo "<?php echo \$this->Form->postLink(__('<span class=\"btn btn-danger btn-md\"><span class=\"glyphicon glyphicon-remove\"></span>&nbsp;' . __(\"Delete\") . '</span>'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['name'])); ?>\n"; ?>
            </div>
        </div>
        <div class="col-md-12">			
            <table cellpadding="0" cellspacing="0" class="table table-bordered horizontal-form">
                <?php foreach ($fields as $field): ?>
                <?php if($field != "created" && $field != "updated" && $field != "deleted" && $field != "photo_dir"): ?>
                <tr>
                    <?php echo "<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n"; ?>
                    <?php if (strpos($field, '_id')): ?>
                    <?php echo "<td><?php echo h(\${$singularVar}['" . ucfirst(str_replace('_id','', $field)) . "']['name']); ?>&nbsp;</td>\n"; ?>
                    <?php elseif (strpos($field, '_type')): ?>
                    <?php echo "<td><?php echo h(\${$field}[\${$singularVar}['{$modelClass}']['{$field}']]); ?>&nbsp;</td>\n"; ?>
                    <?php elseif (strpos($field, '_flg')): ?>
                    <?php echo "<td><?php echo h(\$check[\${$singularVar}['{$modelClass}']['{$field}']]); ?>&nbsp;</td>\n"; ?>
                    <?php elseif (strpos($field, 'date')): ?>
                    <?php echo "<td><?php echo date(\"Y年m月d日\", strtotime(\${$singularVar}['{$modelClass}']['{$field}'])); ?>&nbsp;</td>\n"; ?>
                    <?php elseif (strpos($field, 'birthday')): ?>
                    <?php echo "<td><?php echo date(\"Y年m月d日\", strtotime(\${$singularVar}['{$modelClass}']['{$field}'])); ?>&nbsp;</td>\n"; ?>
                    <?php elseif ($field == 'photo'): ?>
                    <?php echo "<td><?php echo !empty(\${$singularVar}['{$modelClass}']['{$field}']) ? \$this->Html->image('/read/{$field}/{$singularVar}/' . \${$singularVar}['{$modelClass}']['id'] . '/detail') : ''; ?>&nbsp;</td>\n"; ?>
                    <?php elseif (
                    $field == 'comment' ||
                    $field == 'description' || 
                    $field == 'question' ||
                    $field == 'contents' 
                    ): ?>
                    <?php echo "<td><?php echo nl2br(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n"; ?>
                    <?php elseif (strpos($field, 'price')): ?>
                    <?php echo "<td><?php echo empty(\${$singularVar}['{$modelClass}']['{$field}']) ? \"未設定\" : number_format(\${$singularVar}['{$modelClass}']['{$field}']) . \"円\"; ?>&nbsp;</td>\n"; ?>
                    <?php else: ?>
                    <?php echo "<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n"; ?>
                    <?php endif; ?>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php if (!empty($associations['hasAndBelongsToMany'])): ?>
                <?php foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData): ?>
                <tr>
                    <th><?php echo "<?php echo __('" .$assocName. "') ?>"; ?></th>
                    <td>
                        <?php echo "<?php foreach(\${$singularVar}['{$assocName}'] AS \$" . mb_strtolower($assocName) . "): ?>\n"; ?>
                        <?php echo "<?php if(\$" . mb_strtolower($assocName) . "['del_flg'] == 0) { ?>\n"; ?>
                        <?php echo "<?php echo h(\$" . mb_strtolower($assocName) . "['name']) ?>\n"; ?>
                        <?php echo "<?php } ?>\n"; ?>
                        <?php echo "<?php endforeach; ?>\n"; ?>
                        &nbsp;
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
