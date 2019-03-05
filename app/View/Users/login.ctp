<div class="py-5">
	<div class="users form px-4 pt-3 pb-4 border mx-auto col-sm-2 mt-5">
	<?php echo $this->Flash->render('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
		<h4>ログイン</h4>
	    <div class="form-group mt-3">
	    <label class="mb-0 font-weight-bold" style="font-size:13px;">ユーザー名</label>
	    <?php
	        echo $this->Form->input('username',
	        	array(
	        		'class'    => 'd-block w-100 form-control form-control-sm',
	        		'label'    => '',
	        		'div'          => false,
	        	)
	    	);
	    ?>
	    </div>
	    <div class="form-group">
	    <label class="mb-0 font-weight-bold" style="font-size:13px;">パスワード</label>
	    <?php
	        echo $this->Form->input('password',
	        	array(
	        		'class'    => 'd-block w-100 form-control form-control-sm',
	        		'label'    => '',
	        		'div'          => false,
	        	)
	    	);
	    ?>
	    </div>

	    <?php echo $this->Form->submit('ログイン', array(
	       'div'    => false,
	       'escape' => false,
	       'class'  => 'btn btn-sm btn-am-yl border-onion mt-3 w-100',
	     ))?>

	<?php echo $this->Form->end(); ?>
	</div>
</div>