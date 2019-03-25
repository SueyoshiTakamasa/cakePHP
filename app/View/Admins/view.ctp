<div class="admins view">
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link(__('Home'), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Admin'), array('action' => 'index'), array('escape' => false)); ?></li>
        <li class="active">『<?php echo h($admin['Admin']['name']); ?>』の<?php echo __('View'); ?></li>
    </ol>

    <div class="row">
        <div class="form-group text-right">
            <div class="col-md-12">			
            <?php echo $this->Html->link(__('<span class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span>&nbsp;' . __("Edit") . '</span>'), array('action' => 'edit', $admin['Admin']['id']), array('escape' => false)); ?>
            <?php echo $this->Html->link(__('<span class="btn btn-warning btn-md"><span class="glyphicon glyphicon-th-list"></span>&nbsp;' . __("List") . '</span>'), array('action' => 'index'), array('escape' => false)); ?>
            <?php echo $this->Form->postLink(__('<span class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span>&nbsp;' . __("Delete") . '</span>'), array('action' => 'delete', $admin['Admin']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $admin['Admin']['name'])); ?>
            </div>
        </div>
        <div class="col-md-12">			
            <table cellpadding="0" cellspacing="0" class="table table-bordered horizontal-form">
                                                <tr>
                    <th><?php echo __('Id'); ?></th>
                                        <td><?php echo h($admin['Admin']['id']); ?>&nbsp;</td>
                                    </tr>
                                                                <tr>
                    <th><?php echo __('Name'); ?></th>
                                        <td><?php echo h($admin['Admin']['name']); ?>&nbsp;</td>
                                    </tr>
                                                                <tr>
                    <th><?php echo __('Photo'); ?></th>
                                        <td><?php echo !empty($admin['Admin']['photo']) ? $this->Html->image('/read/photo/admin/' . $admin['Admin']['id'] . '/detail') : ''; ?>&nbsp;</td>
                                    </tr>
                                                                <tr>
                    <th><?php echo __('Birthday'); ?></th>
                                        <td><?php echo h($admin['Admin']['birthday']); ?>&nbsp;</td>
                                    </tr>
                                                                <tr>
                    <th><?php echo __('Comment'); ?></th>
                                        <td><?php echo nl2br($admin['Admin']['comment']); ?>&nbsp;</td>
                                    </tr>
                                                                                                                                <tr>
                    <th><?php echo __('Shop Id'); ?></th>
                                        <td><?php echo h($admin['Shop']['name']); ?>&nbsp;</td>
                                    </tr>
                                                                                                <tr>
                    <th><?php echo __('Employment Type'); ?></th>
                                        <td><?php echo h($employment_type[$admin['Admin']['employment_type']]); ?>&nbsp;</td>
                                    </tr>
                                                                                <tr>
                    <th><?php echo __('Paymenttype') ?></th>
                    <td>
                        <?php foreach($admin['Paymenttype'] AS $paymenttype): ?>
                        <?php if($paymenttype['del_flg'] == 0) { ?>
                        <?php echo h($paymenttype['name']) ?>
                        <?php } ?>
                        <?php endforeach; ?>
                        &nbsp;
                    </td>
                </tr>
                                            </table>
        </div>
    </div>
</div>
