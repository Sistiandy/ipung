<?php $this->load->view('admin/upload'); ?>
<?php $this->load->view('admin/editor'); ?>

<?php
if (isset($slide)) {
    $inputJudulValue = $slide['slide_title'];
    $inputUrlValue = $slide['slide_url'];
    $inputRingkasanValue = $slide['slide_description'];
    $inputStatus = $slide['slide_is_published'];
} else {
    $inputJudulValue = set_value('slide_title');
    $inputRingkasanValue = set_value('slide_description');
    $inputStatus = set_value('slide_is_published');
    $inputUrlValue = set_value('slide_url');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($slide)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Slide</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($slide)): ?>
                    <input type="hidden" name="slide_id" value="<?php echo $slide['slide_id']; ?>" />
                <?php endif; ?>
                <label >Judul Slide *</label>
                <input name="slide_title" placeholder="Judul Slide" type="text" class="form-control" value="<?php echo $inputJudulValue; ?>"><br>
                <label >Url Slide *</label>
                <input name="slide_url" placeholder="Url Slide" type="text" class="form-control" value="<?php echo $inputUrlValue; ?>"><br>
                <label >Deskripsi Slide *</label>
                <textarea name="slide_description" class="editor"><?php echo $inputRingkasanValue; ?></textarea><br />
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
                <div class="form-group">
                    <div class="box4">
                        <label for="image">Unggah File Gambar</label>
                        <!--<input id="image" type="file" name="inputGambar">-->
                        <a name="action" id="openmm"type="submit" value="save" class="btn btn-info"><i class="fa fa-upload"></i> Upload</a>
                        <div style="display: none;" ><a href="" id="opentiny">Open</a></div>
                        <input type="hidden" name="inputGambarExisting">
                        <input type="hidden" name="inputGambarExistingId">

                        <?php if (isset($slide) AND !empty($slide['slide_image'])): ?>
                            <div class="thumbnail mt10">
                                <img class="previewTarget" src="<?php echo $slide['slide_image']; ?>" style="width: 280px !important" >
                            </div>
                            <input type="hidden" name="inputGambarCurrent" value="<?php echo $slide['slide_image']; ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <label>Status Publikasi</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="slide_is_published" value="0" <?php echo ($inputStatus == 0) ? 'checked' : ''; ?>> Draft
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="slide_is_published" value="1" <?php echo ($inputStatus == 1) ? 'checked' : ''; ?>> Terbit
                        </label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/slide'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($slide)): ?>
                        <a href="<?php echo site_url('admin/slide/delete/' . $slide['slide_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($slide)): ?>
    <!-- Delete Confirmation -->
    <div class="modal fade" id="confirm-del">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><b><span class="fa fa-warning"></span> Konfirmasi Penghapusan</b></h4>
                </div>
                <div class="modal-body">
                    <p>Data yang dipilih akan dihapus oleh sistem, apakah anda yakin?;</p>
                </div>
                <?php echo form_open('admin/slide/delete/' . $slide['slide_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $slide['slide_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $slide['slide_title'] ?>" />
                    <button type="submit" class="btn btn-danger"> Ya</button>
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php if ($this->session->flashdata('delete')) { ?>
    <script type="text/javascript">
        $(window).load(function() {
            $('#confirm-del').modal('show');
        });
    </script>
    <?php }
    ?>
<?php endif; ?>