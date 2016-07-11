<?php $this->load->view('admin/upload'); ?>
<?php $this->load->view('admin/editor'); ?>
<?php $this->load->view('admin/multi_js'); ?>

<?php
if (isset($catalog)) {
    $inputName = $catalog['catalog_name'];
    $inputBrand = $catalog['brand_brand_id'];
    $inputDesc = $catalog['catalog_description'];
    $inputStatus = $catalog['catalog_for_sale'];
    $inputStock = $catalog['catalog_real_stock'];
} else {
    $inputName = set_value('catalog_name');
    $inputBrand = set_value('brand_brand_id');
    $inputDesc = set_value('catalog_description');
    $inputStatus = set_value('catalog_for_sale');
    $inputStock = set_value('catalog_real_stock');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($catalog)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Katalog</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($catalog)): ?>
                    <input type="hidden" name="catalog_id" value="<?php echo $catalog['catalog_id']; ?>" />
                <?php endif; ?>
                <label >Nama Katalog *</label>
                <input name="catalog_name" placeholder="Nama Katalog" type="text" class="form-control" value="<?php echo $inputName; ?>"><br>
                <label>Brand *</label>
                <select name="brand_id" class="form-control">
                    <option value="">-- Pilih Brand --</option>
                    <?php foreach ($brand as $row): ?>
                        <option value="<?php echo $row['brand_id'] ?>" <?php echo ($inputBrand == $row['brand_id'])? 'selected' : '' ?>><?php echo $row['brand_name'] ?></option>
                    <?php endforeach ?>
                </select><br>
                <label>Kategori *</label>
                <div ng-controller="categoryCtrl">
                    <div ng-repeat="model in categoryOutput">
                        <input type="hidden" name="category_id[]" value="{{model.category_id}}" ng-model="model.category_id">
                    </div>
                    <div
                    isteven-multi-select
                    input-model="category"
                    output-model="categoryOutput"
                    default-label="Pilih Kategori"
                    button-label="category_name"
                    item-label="category_name"
                    max-labels="5"
                    tick-property="ticked"
                    >
                </div>
            </div><br>
            <label >Stok *</label>
            <input name="catalog_real_stock" placeholder="Stok Katalog" type="number" class="form-control" value="<?php echo $inputStock; ?>"><br>
            <label >Deskripsi Katalog *</label>
            <textarea name="catalog_description" rows="10" class="editor"><?php echo $inputDesc; ?></textarea><br />
            <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            <div class="form-group">
                <div class="box4">
                    <label for="image">Unggah File Gambar</label>
                    <!--<input id="image" type="file" name="inputGambar">-->
                    <a name="action" id="openmm"type="submit" value="save" class="btn btn-info"><i class="fa fa-upload"></i> Upload</a>
                    <div style="display: none;" ><a href="" id="opentiny">Open</a></div>
                    <input type="hidden" name="inputGambarExisting">
                    <input type="hidden" name="inputGambarExistingId">

                    <?php if (isset($catalog) AND !empty($catalog['catalog_image'])): ?>
                        <div class="thumbnail mt10">
                            <img class="previewTarget" src="<?php echo $catalog['catalog_image']; ?>" style="width: 280px !important" >
                        </div>
                        <input type="hidden" name="inputGambarCurrent" value="<?php echo $catalog['catalog_image']; ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-md-3">
            <div class="form-group">
                <label>Status Publikasi</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="catalog_for_sale" value="0" <?php echo ($inputStatus == 0) ? 'checked' : ''; ?>> Tidak dijual
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="catalog_for_sale" value="1" <?php echo ($inputStatus == 1) ? 'checked' : ''; ?>> Dijual
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                <a href="<?php echo site_url('admin/catalog'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                <?php if (isset($catalog)): ?>
                    <a href="#confirm-del" data-toggle="modal" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
</div>

<?php if (isset($catalog)): ?>
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
                <?php echo form_open('admin/catalog/delete/' . $catalog['catalog_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $catalog['catalog_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $catalog['catalog_name'] ?>" />
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

<script>
    var catalogApp = angular.module("catalogApp", ["isteven-multi-select"]);
    var SITEURL = "<?php echo site_url() ?>";

    catalogApp.controller('categoryCtrl', function($scope, $http) {
        $scope.categoryOutput = [];
        $scope.category = [];

        $scope.getCatalogCategory = function() {

            <?php if(isset($catalog)){ ?>
                var url = SITEURL + 'api/get_catalog_category/' + <?php echo $catalog['catalog_id'] ?>;
                <?php }else{ ?>
                    var url = SITEURL + 'api/get_catalog_category';
                    <?php } ?>
                    $http.get(url).then(function(response) {
                        $scope.category = response.data;
                    })

                }();
            });
</script>