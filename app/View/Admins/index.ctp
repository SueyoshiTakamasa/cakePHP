<div class="admins index col-md-10">
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display'), array('escape' => false)); ?></li>
        <li class="active"><?php echo __('Admins'); ?></li>
    </ol>

    <div class="row">
        <div class="form-group text-right">
		    <div class="col-md-12 action-btns">
            <?php echo $this->Html->link(__('<span class="btn btn-primary btn-md">' . __("Admin").__("Add") . '</span>'), array('action' => 'add'), array('escape' => false)); ?>
            </div>
        </div>
		<div class="col-md-12">
            <div class="table-scrollable">
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                    <thead>
                        <tr class="info">
                                                                                    <th><?php echo $this->Paginator->sort('id', __('Id'), array('direction' => 'desc')); ?></th>
                                                                                                                <th><?php echo $this->Paginator->sort('name', __('Name'), array('direction' => 'desc')); ?></th>
                                                                                                                <th><?php echo $this->Paginator->sort('photo', __('Photo'), array('direction' => 'desc')); ?></th>
                                                                                                                <th><?php echo $this->Paginator->sort('birthday', __('Birthday'), array('direction' => 'desc')); ?></th>
                                                                                                                                                                                                                                                                                                                                                                            <th><?php echo $this->Paginator->sort('shop_id', __('Shop Id'), array('direction' => 'desc')); ?></th>
                                                                                                                <th><?php echo $this->Paginator->sort('emplyment_type', __('Emplyment Type'), array('direction' => 'desc')); ?></th>
                                                                                    <th class="actions" style="min-width: 126px; width: 126px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($admins as $admin): ?>
                        <tr>
                                                                                    <td><?php echo h($admin['Admin']['id']); ?>&nbsp;</td>
                                                                                                                <td><?php echo h($admin['Admin']['name']); ?>&nbsp;</td>
                                                                                                                <td><?php echo !empty($admin['Admin']['photo']) ? $this->Html->image('/read/photo/admin/' . $admin['Admin']['id'] . '/thumb') : ''; ?>&nbsp;</td>
                                                                                                                <td><?php echo h($admin['Admin']['birthday']); ?>&nbsp;</td>
                                                                                                                                                                                                                                                                                                                                                                            <td><?php echo h($admin['Shop']['name']); ?>&nbsp;</td>
                                                                                                                <td><?php echo h($emplyment_type[$admin['Admin']['emplyment_type']]); ?>&nbsp;</td>
                                                                                    <td class="actions text-right">
                                <?php echo $this->Html->link('<span class="btn btn-info btn-xs"><span class="glyphicon glyphicon-plus"></span>&nbsp;' . __('View') . '</span>', array('action' => 'view', $admin['Admin']['id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link('<span class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span>&nbsp;' . __('Edit') . '</span>', array('action' => 'edit', $admin['Admin']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>&nbsp;' . __('Delete') . '</span>', array('action' => 'delete', $admin['Admin']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $admin['Admin']['name'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <p>
            <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
            </p>

            <?php
$params = $this->Paginator->params();
if ($params['pageCount'] > 1) {
?>
            <ul class="pagination pagination-sm">
                <?php echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
 ?>                <?php echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a')); ?>
                <?php echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false)); ?>
            </ul>
            <?php } ?>
        </div>
    </div>
</div>
