<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Slide
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/slide') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/slide/edit/' . $slide['slide_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-2">
                <?php if (!empty($slide['slide_image'])) { ?>
                    <img src="<?php echo upload_url($slide['slide_image']) ?>" class="img-responsive ava-detail">
                <?php } else { ?>
                    <img src="<?php echo base_url('media/images/missing-image.png') ?>" class="img-responsive ava-detail">
                <?php } ?>
            </div>
            <div class="col-md-10">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Judul Slide</td>
                            <td>:</td>
                            <td><?php echo $slide['slide_title'] ?></td>
                        </tr>
                        <tr>
                            <td>URL</td>
                            <td>:</td>
                            <td><?php echo $slide['slide_url'] ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td><?php echo $slide['slide_description'] ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $slide['slide_is_published'] == 0 ? 'Draft' : 'Terbit' ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal publikasi</td>
                            <td>:</td>
                            <td><?php echo pretty_date($slide['slide_input_date']) ?></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td>:</td>
                            <td><?php echo $slide['user_full_name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>