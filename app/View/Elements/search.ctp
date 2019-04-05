<?php echo $this->Form->create('Post', array(
  'url'        => '/Posts/index',
  'novalidate' => true,
  'class'      => 'w-75 mr-auto',
  'id'         => 'searchBox',
))?>
<div class="d-flex align-items-end mb-4">
    <!-- タイトル -->
    <div class="form-group w-50 mb-0">
        <label class="mb-0 font-weight-bold" style="font-size:12px;">タイトル</label>
      <?php echo $this->Form->input('title', array(
        'type' => 'text',
        'div' => false,
        'label' => false,
        'required'   => false,
        'class' => 'form-control form-control-sm rounded-0 rounded-left',
        ))?>
    </div>

    <!--カテゴリー -->
    <div class="form-group w-25 mb-0 rounded-0">
      <label class="mb-0 font-weight-bold" style="font-size:12px;">カテゴリー</label>
        <?php echo $this->Form->input('category', array(
        'type'         =>'select',
        'options'      =>$list,
        'label'        => '',
        'div'          => false,
        'class'        => 'form-control form-control-sm rounded-0',
      ))
        ?>
    </div>

    <!--タグ -->
   <div class="form-group mb-0">
        <label class="mb-0 font-weight-bold" style="font-size:12px;">タグ</label>
        <div class="dropdown w-25 rounded-0">
          <button class="btn btn-sm bg-white border dropdown-toggle d-block px-2 rounded-0" id="dropdownMenuButton" data-toggle="dropdown" type="button">
              タグを表示する
              <span class="caret"></span>
          </button>
          <div class="dropdown-menu d-none" aria-labelledby="dropdownMenuButton">
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
       'class'  => 'btn btn-sm btn-fb--green mt-2 pl-4 pr-4 h-25 rounded-0 rounded-right',
     ))?>
</div>


<?php echo $this->Form->end()?>