<?php $this->load->view('admin/upload'); ?>
<?php $this->load->view('admin/editor'); ?>

<?php
if (isset($testimoni)) {
    $NameValue = $testimoni['testimoni_user_name'];
    $JobValue = $testimoni['testimoni_user_job'];
    $EmailValue = $testimoni['testimoni_user_email'];
    $AddressValue = $testimoni['testimoni_user_address'];
    $CommentValue = $testimoni['testimoni_user_comment'];
    $publishValue = $testimoni['testimoni_is_published'];
} else {
    $NameValue = set_value('testimoni_user_name');
    $JobValue = set_value('testimoni_user_job');
    $EmailValue = set_value('testimoni_email');
    $AddressValue = set_value('testimoni_user_address');
    $CommentValue = set_value('testimoni_user_comment');
    $inputStatus = set_value('testimoni_is_published');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($testimoni)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Testimoni</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($testimoni)): ?>
                    <input type="hidden" name="testimoni_id" value="<?php echo $testimoni['testimoni_id']; ?>" />
                <?php endif; ?>
                <label >Nama *</label>
                <input name="testimoni_user_name" placeholder="Nama" type="text" class="form-control" value="<?php echo $NameValue; ?>"><br>
                
                <label >Pekerjaan *</label>
                <input name="testimoni_user_job" placeholder="Pekerjaan" type="text" class="form-control" value="<?php echo $JobValue; ?>"><br>
                
                <label >Email *</label>
                <input name="testimoni_user_email" placeholder="Email" type="text" class="form-control" value="<?php echo $EmailValue; ?>"><br>
                
                <label >Alamat *</label>
                <textarea name="testimoni_user_address" class="editor"><?php echo $AddressValue; ?></textarea><br />
                
                <label >Testimoni *</label>
                <textarea name="testimoni_user_comment" class="editor"><?php echo $CommentValue; ?></textarea><br />
                
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
                <div class="form-group">
                    <div class="box4">
                        <label for="image">Unggah File Gambar</label>
                        <!--<input id="image" type="file" name="inputGambar">-->
                        <a name="action" id="openmm"type="submit" value="save" class="btn btn-info"><i class="fa fa-upload"></i> Upload</a>
                        <div style="display: none;" ><a href="" id="opentiny">Open</a></div>
                        <input type="hidden" name="inputGambarExisting">
                        <input type="hidden" name="inputGambarExistingId">

                        <?php if (isset($testimoni) AND !empty($testimoni['testimoni_image'])): ?>
                            <div class="thumbnail mt10">
                                <img class="previewTarget" src="<?php echo $testimoni['testimoni_image']; ?>" style="width: 280px !important" >
                            </div>
                            <input type="hidden" name="inputGambarCurrent" value="<?php echo $testimoni['testimoni_image']; ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <label>Status Publikasi</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="testimoni_is_published" value="0" <?php echo ($inputStatus == 0) ? 'checked' : ''; ?>> Draft
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="testimoni_is_published" value="1" <?php echo ($inputStatus == 1) ? 'checked' : ''; ?>> Terbit
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/testimoni'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($testimoni)): ?>
                        <a  href="#confirm-del" data-toggle="modal" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($testimoni)): ?>
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
                <?php echo form_open('admin/testimoni/delete/' . $testimoni['testimoni_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $testimoni['testimoni_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $testimoni['testimoni_user_name'] ?>" />
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