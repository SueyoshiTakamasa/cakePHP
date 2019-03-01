<?php echo $this->Form->create('Post', array(
  'url'        => '/Posts/index',
  'novalidate' => true,
  'class'      => 'border mt-4 p-4 bg-white',
))?>
    <!-- タイトル -->
    <div class="form-group">
        <label>タイトル</label>
      <?php echo $this->Form->input('title', array(
        'type' => 'text',
        'div' => false,
        'label' => false,
        'class' => 'form-control w-50',
        ))?>
    </div>

    <!--カテゴリー -->
    <div class="form-group">
      <label>カテゴリー</label>
        <?php echo $this->Form->input('category', array(
        'type'         =>'select',
        'options'      =>$list,
        'label'        => '',
        'empty'        => '',
        'div'          => false,
        'selected'     => '',
        'class'        => 'form-control w-25',
      ))
        ?>
    </div>

    <!--タグ -->
    <div class="form-group">
        <label>タグ</label>
        <div class="checkbox-room">
          <?php
            echo $this->Form->input('tag',array(
                'type'     =>'select',
                'options'  =>$tag,
                'multiple' =>'checkbox',
                'size'     => 5,
                'label'    =>array(
                  'text'  => '',
                  'class' => 'form-check-label',
                ),
                'div'      => false,
                'class'    =>'form-check form-check-inline'
            ));
          ?>
        </div>

    </div>

  <?php echo $this->Form->submit('絞り込む', array(
     'div'    => false,
     'escape' => false,
     'class'  => 'btn btn-fb--green mt-2 pl-4 pr-4',
   ))?>


<?php echo $this->Form->end()?>