<div class="<?php echo $pluralVar; ?> index col-md-10">
    <ol class="breadcrumb">
        <li><?php echo "<?php echo \$this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display'), array('escape' => false)); ?>"; ?></li>
        <li class="active"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></li>
    </ol>

    <div class="row">
        <div class="form-group text-right">
		    <div class="col-md-12 action-btns">
            <?php echo "<?php echo \$this->Html->link(__('<span class=\"btn btn-primary btn-md\">' . __(\"{$modelClass}\").__(\"Add\") . '</span>'), array('action' => 'add'), array('escape' => false)); ?>\n"; ?>
            </div>
        </div>
		<div class="col-md-12">
            <div class="table-scrollable">
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <?php foreach ($fields as $field): ?>
                            <?php if($field == "created" || $field == "updated" || $field == "deleted"): ?>
                            <?php elseif (
                            $field == 'photo_dir' ||
                            $field == 'comment' ||
                            $field == 'description' || 
                            $field == 'question' ||
                            $field == 'contents' 
                            ): ?>
                            <?php else: ?>
                            <th><?php echo "<?php echo \$this->Paginator->sort('{$field}', __('".Inflector::humanize($field)."'), array('direction' => 'desc')); ?>"; ?></th>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <th class="actions" style="min-width: 126px; width: 126px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n"; ?>
                        <tr>
                            <?php foreach ($fields as $field): ?>
                            <?php if($field == "created" || $field == "updated" || $field == "deleted"): ?>
                            <?php elseif (
                            $field == 'photo_dir' ||
                            $field == 'comment' ||
                            $field == 'description' || 
                            $field == 'question' ||
                            $field == 'contents' 
                            ): ?>
                            <?php elseif (strpos($field, '_id')): ?>
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
                            <?php echo "<td><?php echo !empty(\${$singularVar}['{$modelClass}']['{$field}']) ? \$this->Html->image('/read/{$field}/{$singularVar}/' . \${$singularVar}['{$modelClass}']['id'] . '/thumb') : ''; ?>&nbsp;</td>\n"; ?>
                            <?php elseif (strpos($field, 'price')): ?>
                            <?php echo "<td><?php echo empty(\${$singularVar}['{$modelClass}']['{$field}']) ? \"未設定\" : number_format(\${$singularVar}['{$modelClass}']['{$field}']) . \"円\"; ?>&nbsp;</td>\n"; ?>
                            <?php else: ?>
                            <?php echo "<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n"; ?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <td class="actions text-right">
                                <?php echo "<?php echo \$this->Html->link('<span class=\"btn btn-info btn-xs\"><span class=\"glyphicon glyphicon-plus\"></span>&nbsp;' . __('View') . '</span>', array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false)); ?>\n"; ?>
                                <?php echo "<?php echo \$this->Html->link('<span class=\"btn btn-warning btn-xs\"><span class=\"glyphicon glyphicon-edit\"></span>&nbsp;' . __('Edit') . '</span>', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false)); ?>\n"; ?>
                                <?php echo "<?php echo \$this->Form->postLink('<span class=\"btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-remove\"></span>&nbsp;' . __('Delete') . '</span>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['name'])); ?>\n"; ?>
                            </td>
                        </tr>
                    <?php echo "<?php endforeach; ?>\n"; ?>
                    </tbody>
                </table>
            </div>

            <p>
            <small><?php echo "<?php echo \$this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>"; ?></small>
            </p>

            <?php
            echo "<?php\n";
            echo "\$params = \$this->Paginator->params();\n";
            echo "if (\$params['pageCount'] > 1) {\n";
            echo "?>\n";
            ?>
            <ul class="pagination pagination-sm">
                <?php echo "<?php echo \$this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick=\"return false;\">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));\n ?>"; ?>
                <?php echo "<?php echo \$this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a')); ?>\n"; ?>
                <?php echo "<?php echo \$this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick=\"return false;\">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false)); ?>\n"; ?>
            </ul>
            <?php echo "<?php } ?>\n";?>
        </div>
    </div>
</div>
