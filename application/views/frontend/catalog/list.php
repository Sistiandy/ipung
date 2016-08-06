<div class="top-space">
    <nav class="breadcrumbs">
        <span class="nav-bread">
            <a href="<?php echo site_url() ?>">Home</a> &rarr;
            <span>Catalog</span>>
        </span>
    </nav>
    <div class="fullwidth-block" style="background:#f8f8f8;">
        <div class="container">
            <h2 class="section-title">Daftar Produk</h2>
            <div class="row">
                <?php foreach ($catalog as $row): ?>
                    <div class="filterable-item ">
                        <article class="offer-item">
                            <figure class="featured-image">
                                <div class="imgLiquidFill imgLiquid" style="height: 190px; width: 359; border-radius: 5px; ">
                                    <img class="img-responsive" src="<?php echo upload_url($row['catalog_image']) ?>" alt="" >
                                </div>
                            </figure>
                            <div class="category pull-right">
                                <a href="<?php echo catalog_url($row) ?>" class="button">Detail</a>
                            </div>
                            <h2 class="entry-title"><a href="<?php echo catalog_url($row) ?>"><?php echo $row['catalog_name'] ?></a></h2>
                            <p class="category-base"><i>Categori: <?php
                                    foreach ($cat_has_category as $key) {
                                        if ($row['catalog_id'] == $key['catalog_catalog_id']) {
                                            echo $key['category_name'] . ', ';
                                        }
                                    }
                                    ?></i></p>
                            
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>