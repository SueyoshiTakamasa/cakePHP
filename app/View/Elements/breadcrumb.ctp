<div class="px-3 py-2">
    <!-- パンくずリスト -->
    <?php
        echo '<nav aria-label="breadcrumb" class="fz-12">';
        echo $this->Html->getCrumbs(' &rsaquo; ', array(
                'text' => '<i class="fas fa-home text-secondary"></i>ホーム',
                'url' => '/',
                'escape' => false,
            ));
        echo '</nav>';
     ?>
</div>