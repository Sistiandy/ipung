<div class="top-space">
    <nav class="breadcrumbs">
        <span class="nav-bread">
            <a href="<?php echo site_url() ?>">Home</a> &rarr;
            <span>Testimoni</span>>
        </span>
    </nav>
    <div class="fullwidth-block">
        <div class="container">
            <h2 class="section-title">Testimonials</h2>
            <div class="row">
                <?php foreach ($testimoni as $row): ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="testimonial wow fadeInUp" style="min-height: 290px; height: 320px;">
                            <figure class="avatar imgLiquidFill imgLiquid imgLiquid_bgSize imgLiquid_ready" style="min-height: 98px; height: 100px; border-radius: 50px; background-image: url(&quot;<?php echo media_url() ?>/images/-text.png&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                                <img src="<?php echo upload_url($row['testimoni_user_image']) ?>" class="img-responsive" style="display: none;">
                            </figure>
                            <div class="testimonial-body">
                                <cite><?php echo $row['testimoni_user_name'] ?></cite>
                                <span><u><?php echo $row['testimoni_user_job'] ?></u></span>
                                <p><?php echo strip_tags(character_limiter($row['testimoni_user_comment'], 100)); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>