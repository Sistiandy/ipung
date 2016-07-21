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
                        <div class="testimonial wow fadeInUp">
                            <figure class="avatar"><img src="<?php echo upload_url($row['testimoni_user_image']) ?>" alt=""></figure>
                            <div class="testimonial-body">
                                <p><?php echo strip_tags(character_limiter($row['testimoni_user_comment'], 100)); ?></p>
                                <cite><?php echo $row['testimoni_user_name'] ?></cite>
                                <span><?php echo $row['testimoni_user_job'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>