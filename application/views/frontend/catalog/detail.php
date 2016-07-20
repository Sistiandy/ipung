<div class="top-space">
    <nav class="breadcrumbs">
        <span class="nav-bread">
            <a href="<?php echo site_url() ?>">Home</a> &rarr;
            <a href="<?php echo site_url('catalog') ?>">Catalog</a> &rarr;
            <span>Detail</span>>
        </span>
    </nav>
    <div class="fullwidth-block">
        <div class="container">
            <div class="row">
                <div class="col-md-7 wow fadeInLeft">
                    <h2 class="section-title">Detail Produk <?php echo $catalog['catalog_name'] ?></h2>
                    <figure>
                        <div class="imgLiquidFill imgLiquid imgLiquid_bgSize imgLiquid_ready" style="max-height: 300px; height: 300px; border-radius: 5px; background-image: url(&quot;media/images/slide/produk/ponds.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                            <img class="img-responsive" src="<?php echo $catalog['catalog_image'] ?>" alt="" width="100%">
                        </div>
                    </figure>

                    <?php echo $catalog['catalog_description'] ?>
                </div>
                <div class="col-md-4 col-md-push-1 wow fadeInRight">
                    <h2 class="section-title">Kategori Lainnya</h2>
                    <?php foreach ($categories as $row): ?>
                        <a href="<?php echo catalog_category_url($row) ?>" class="boxed-link"><?php echo $row['category_name'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>

    <div class="fullwidth-block" data-bg-color="#f1f1f1">
        <div class="container">
            <h2 class="section-title">Produk Lainya</h2>
            <div class="row">
                <?php foreach ($catalogs as $row): ?>
                    <div class="filterable-item ">
                        <article class="offer-item">
                            <figure class="featured-image">
                                <div class="imgLiquidFill imgLiquid" style="height: 190px; width: 359; border-radius: 5px; ">
                                    <img class="img-responsive" src="<?php echo upload_url($row['catalog_image']) ?>" alt="" >
                                </div>
                            </figure>
                            <h2 class="entry-title"><a href="<?php echo catalog_url($row) ?>"><?php echo $row['catalog_name'] ?></a></h2>
                            <p class="category-base"><i>Categori: <?php
                                    foreach ($cat_has_categories as $key) {
                                        if ($row['catalog_id'] == $key['catalog_catalog_id']) {
                                            echo $key['category_name'] . ', ';
                                        }
                                    }
                                    ?></i></p>
                            <div class="">
                                <a href="<?php echo catalog_url($row) ?>" class="button">Detail</a>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>