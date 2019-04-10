<div class="px-2 py-2 bg-light">
    <!-- パンくずリスト -->
    <?php
        echo '<nav aria-label="breadcrumb" class="fz-12">';
        echo $this->Html->getCrumbs(' &rsaquo; ', array(
                'text' => 'ホーム',
                'url' => '/',
                'escape' => false,
            ));
        echo '</nav>';
     ?>
</div>