<?php echo $this->Form->create('Post', array(
  'url'        => '/Posts/index',
  'novalidate' => true,
  'class'      => 'mt-4',
))?>
<div class="d-flex align-items-end">
    <!-- タイトル -->
    <div class="form-group w-50 mb-0">
        <label class="mb-0 font-weight-bold" style="font-size:12px;">タイトル</label>
      <?php echo $this->Form->input('title', array(
        'type' => 'text',
        'div' => false,
        'label' => false,
        'class' => 'form-control',
        ))?>
    </div>

    <!--カテゴリー -->
    <div class="form-group w-25 mb-0">
      <label class="mb-0 font-weight-bold" style="font-size:12px;">カテゴリー</label>
        <?php echo $this->Form->input('category', array(
        'type'         =>'select',
        'options'      =>$list,
        'label'        => '',
        'empty'        => '',
        'div'          => false,
        'selected'     => '',
        'class'        => 'form-control',
      ))
        ?>
    </div>

    <!--タグ -->
   <div class="form-group mb-0">
        <label class="mb-0 font-weight-bold" style="font-size:12px;">タグ</label>
        <div class="dropdown w-25">
          <button class="btn bg-white border dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              タグを表示
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                'class'    =>'form-check dropdown-item'
            ));
          ?>
          </div>
        </div>

    </div>

    <?php echo $this->Form->submit('絞り込む', array(
       'div'    => false,
       'escape' => false,
       'class'  => 'btn btn-fb--green mt-2 pl-4 pr-4 h-25',
     ))?>
</div>


<?php echo $this->Form->end()?>