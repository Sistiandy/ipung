<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Katalog
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/catalog') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/catalog/edit/' . $catalog['catalog_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-2">
                <?php if (!empty($catalog['catalog_image'])) { ?>
                    <img src="<?php echo upload_url($catalog['catalog_image']) ?>" class="img-responsive ava-detail">
                <?php } else { ?>
                    <img src="<?php echo base_url('media/image/missing-image.png') ?>" class="img-responsive ava-detail">
                <?php } ?>
            </div>
            <div class="col-md-10">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Nama Katalog</td>
                            <td>:</td>
                            <td><?php echo $catalog['catalog_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>
                                <?php
                                $i=1;
                                foreach ($category as $key) {
                                    if ($key['catalog_catalog_id'] == $catalog['catalog_id']):
                                        if ($i > 1) {
                                            echo ', ';
                                        }
                                        echo $key['category_name'];
                                        $i++;
                                    endif;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Brand</td>
                            <td>:</td>
                            <td><?php echo $catalog['brand_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $catalog['catalog_for_sale'] == 0 ? 'Tidak dijual' : 'Dijual' ?></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>:</td>
                            <td><?php echo $catalog['catalog_real_stock'] ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td><?php echo $catalog['catalog_description'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal publikasi</td>
                            <td>:</td>
                            <td><?php echo pretty_date($catalog['catalog_input_date']) ?></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td>:</td>
                            <td><?php echo $catalog['user_name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>