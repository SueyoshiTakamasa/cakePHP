<div class="testposts view">
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link(__('Home'), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Testpost'), array('action' => 'index'), array('escape' => false)); ?></li>
        <li class="active">『<?php echo h($testpost['Testpost']['name']); ?>』の<?php echo __('View'); ?></li>
    </ol>

    <div class="row">
        <div class="form-group text-right">
            <div class="col-md-12">			
            <?php echo $this->Html->link(__('<span class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span>&nbsp;' . __("Edit") . '</span>'), array('action' => 'edit', $testpost['Testpost']['id']), array('escape' => false)); ?>
            <?php echo $this->Html->link(__('<span class="btn btn-warning btn-md"><span class="glyphicon glyphicon-th-list"></span>&nbsp;' . __("List") . '</span>'), array('action' => 'index'), array('escape' => false)); ?>
            <?php echo $this->Form->postLink(__('<span class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span>&nbsp;' . __("Delete") . '</span>'), array('action' => 'delete', $testpost['Testpost']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $testpost['Testpost']['name'])); ?>
            </div>
        </div>
        <div class="col-md-12">			
            <table cellpadding="0" cellspacing="0" class="table table-bordered horizontal-form">
                                                <tr>
                    <th><?php echo __('Id'); ?></th>
                                        <td><?php echo h($testpost['Testpost']['id']); ?>&nbsp;</td>
                                    </tr>
                                                                <tr>
                    <th><?php echo __('Title'); ?></th>
                                        <td><?php echo h($testpost['Testpost']['title']); ?>&nbsp;</td>
                                    </tr>
                                                                <tr>
                    <th><?php echo __('Body'); ?></th>
                                        <td><?php echo h($testpost['Testpost']['body']); ?>&nbsp;</td>
                                    </tr>
                                                                                                <tr>
                    <th><?php echo __('Modified'); ?></th>
                                        <td><?php echo h($testpost['Testpost']['modified']); ?>&nbsp;</td>
                                    </tr>
                                                                                                <tr>
                    <th><?php echo __('Deleted Time'); ?></th>
                                        <td><?php echo h($testpost['Testpost']['deleted_time']); ?>&nbsp;</td>
                                    </tr>
                                                                <tr>
                    <th><?php echo __('Name'); ?></th>
                                        <td><?php echo h($testpost['Testpost']['name']); ?>&nbsp;</td>
                                    </tr>
                                                            </table>
        </div>
    </div>
</div>
