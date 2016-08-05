<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="row top_tiles">
                        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-caret-square-o-right"></i>
                                </div>
                                <div class="count"><?php echo $slide ?></div>

                                <h3><a href="<?php echo site_url('admin/slide') ?>">Slide Show</a></h3>
                                <p>Jumlah slide show yang tersimpan di database.</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="count"><?php echo $catalog ?></div>

                                <h3><a href="<?php echo site_url('admin/catalog') ?>">Catalog</a></h3>
                                <p>Jumlah catalog yang tersimpan di datebase.</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-users"></i>
                                </div>
                                <div class="count"><?php echo $testimoni ?></div>

                                <h3><a href="<?php echo site_url('admin/testimoni') ?>">Testimoni</a></h3>
                                <p>Jumlah orang yang telah memberikan testimoni.</p>
                            </div>
                        </div>
                    </div>
</div>