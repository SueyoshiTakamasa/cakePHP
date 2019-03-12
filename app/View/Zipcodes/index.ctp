<div class="container">

	<?php echo $this->Form->create('Zipcode', array(
	  'class'      => 'mt-4',
	))?>

	<div class="form-group w-25 mb-0">
	    <label class="mb-0 font-weight-bold" style="font-size:12px;">郵便番号</label>
	  <?php echo $this->Form->input('zipcode', array(
	    'type' => 'text',
	    'div' => false,
	    'label' => false,
	    'class' => 'form-control',
	    'id'    => 'zipcode'
	    ))?>
	</div>

	<div class="form-group w-50 mb-0">
	    <label class="mb-0 font-weight-bold" style="font-size:12px;">都道府県</label>
	  <?php echo $this->Form->input('pref', array(
	    'type' => 'text',
	    'div' => false,
	    'label' => false,
	    'class' => 'form-control',
	    ))?>
	</div>

	<div class="form-group w-50 mb-0">
	    <label class="mb-0 font-weight-bold" style="font-size:12px;">市区町村</label>
	  <?php echo $this->Form->input('city', array(
	    'type' => 'text',
	    'div' => false,
	    'label' => false,
	    'class' => 'form-control',
	    ))?>
	</div>

	    <?php echo $this->Form->submit('送信', array(
	       'div'    => false,
	       'escape' => false,
	       'class'  => 'btn btn-fb--green mt-3 pl-4 pr-4 h-25 rounded-0 rounded-right',
	     ))?>

</div>


<?php echo $this->Form->end()?>