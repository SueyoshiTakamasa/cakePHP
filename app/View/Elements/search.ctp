<?php echo $this->Form->create('Post', array(
  'url' => '/Posts/index',
  'novalidate' => true,
))?>

<fieldset>
  <h3>記事を検索する</h3>
  <dl>
    <dt style="background-color: #fff;">
      <label>
          タイトル
      </label>
    </dt>
    <dd><?php echo $this->Form->input('title', array(
      'type' => 'text', 'div' => false, 'label' => false))?></dd>
    <dt><label>カテゴリー</label></dt>
    <dd>
      <?php echo $this->Form->input('category', array(
      'type'=>'select',
      'options'=>$list,
      'label'=>'',
      'empty'=>'',
      'selected'=>''))
      ?>
    </dd>
    <dt style="background-color: #fff;">
      <label>
          タグ
      </label>
    </dt>
    <dd style="border:1px solid #f1f1f1; border-radius:4px; background-color: #fff;">
      <?php
        echo $this->Form->input('tag',array(
            'type'     =>'select',
            'options'  =>$tag,
            'multiple' => 'checkbox',
            'size'     => 5,
            'class'    =>'',
            'label'    =>'',
            'div'      => false,
            'class'    =>'check--original'
        ));
      ?>
    </dd>
  </dl>

  <?php echo $this->Form->submit('検索', array('div' => false, 'escape' => false))?>

</fieldset>

<?php echo $this->Form->end()?>