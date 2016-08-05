<div class="slider">
    <ul class="slides">
        <?php foreach ($slide as $row): ?>
            <li data-background="<?php echo upload_url($row['slide_image']) ?>" style="background-size: cover;background-position: center;background-attachment: fixed;  display: block;">
                <div class="container">
                    <div class="slide-caption col-md-4">
                        <h2 class="slide-title"><a href="" style="color:#1da1f2;"><?php echo $row['slide_title'] ?></a></h2>
                        <p style="color:#000;"><?php echo strip_tags(character_limiter($row['slide_description'], 300)) ?></p>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>

    </ul>
    <div class="flexslider-controls">
        <div class="container">
            <ol class="flex-control-nav">
                <li><a>1</a></li>
                <li><a>2</a></li>
                <li><a>3</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="fullwidth-block features-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature left-icon wow fadeInLeft" data-wow-delay=".3s">
                    <i class="icon-hotel"></i>
                    <h3 class="feature-title">IPUNG SKIN CLINIC CENTER</h3>
                    <p>Natasha Skin Clinic Center memiliki dokter dan para tenaga ahli yang berkompetensi dibidangnya, dengan adanya tim-tim tersebut maka bisa didapatkan kenyamanan anda mengguakan produk sudah terjamin.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature left-icon wow fadeInLeft">
                    <i class="icon-sun"></i>
                    <h3 class="feature-title">IPUNG SKIN CLINIC CENTER</h3>
                    <p>Ipung Skin Clinic Center dengan konsep Nature Meets Technology yang merupakan perpaduan sempurna antara bahan-bahan aktif kosmetik botanical/herbal dengan alat-alat kecantikan berteknologi tinggi.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="feature left-icon wow fadeInRight">
                    <i class="icon-island"></i>
                    <h3 class="feature-title">IPUNG SKIN CLINIC CENTER</h3>
                    <p>Natasha Skin Clinic Center memiliki produk-produk yang menggunakan bahan-bahan botanical yang menggunakan teknologi modern serta memberikan hasil yang optimal dan aman untuk kulit pada usia remaja, pria dan wanita dewasa.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fullwidth-block offers-section" data-bg-color="#f8f8f8">
    <div class="container">
        <h2 class="section-title">Catalog
            <a href="<?php echo site_url('catalog') ?>" class="btn btn-lg btn-primary pull-right wow bounce">Daftar Produk</a></h2>
            <div class="filter-links filterable-nav">
                <a href="#" class=" current wow fadeInRight" data-filter="*">Show all</a>
                <?php foreach ($categories as $row) { ?>
                    <a href="#" class="wow fadeInRight" data-wow-delay=".4s" data-filter=".cat<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></a>
                    <?php } ?>
                </div>

                <div class="filterable-items">
                    <?php foreach ($catalog as $row): ?>
                        <div class="filterable-item <?php
                        foreach ($cat_has_category as $key) {
                            if ($row['catalog_id'] == $key['catalog_catalog_id']) {
                                echo 'cat' . $key['catalog_category_category_id'] . ' ';
                            }
                        }
                        ?>">
                        <article class="offer-item">
                            <figure class="featured-image">
                                <div class="imgLiquidFill imgLiquid" style="height: 190px; width: 359; border-radius: 5px; ">
                                    <img class="img-responsive" src="<?php echo upload_url($row['catalog_image']) ?>" alt="" >
                                </div>
                            </figure>
                            <h2 class="entry-title"><a href="<?php echo catalog_url($row) ?>"><?php echo $row['catalog_name'] ?></a></h2>
                            <p class="category-base"><i>Categori: <?php
                                foreach ($cat_has_category as $key) {
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

        <div class="fullwidth-block testimonial-section">
            <div class="container">
                <h2 class="section-title">Testimonials
                    <a href="<?php echo site_url('testimoni') ?>" class="btn btn-lg btn-primary pull-right wow bounce">Daftar Testimoni</a></h2>
                    <div class="row">
                        <?php foreach ($testimoni as $row): ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="testimonial wow fadeInUp" style="max-height: 270px; height: 300px;">
                                    <figure class="avatar">
                                        <div class="imgLiquidFill imgLiquid imgLiquid_bgSize imgLiquid_ready" style="max-height: 150px; height: 178px; border-radius: 5px; background-image: url(&quot;<?php echo media_url() ?>/images/-text.png&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                                            <img src="<?php echo upload_url($row['testimoni_user_image']) ?>" class="img-responsive" style="display: none;">
                                        </div>
                                    </figure>
                                    <div class="testimonial-body">
                                        <p><?php echo strip_tags(character_limiter($row['testimoni_user_comment'], 100)); ?></p>
                                        <cite><?php echo $row['testimoni_user_name'] ?></cite>
                                        <span><?php echo $row['testimoni_user_job'] ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
