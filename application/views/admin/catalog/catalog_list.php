<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Katalog
            <a href="<?php echo site_url('admin/catalog/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>

        <!-- Indicates a successful or positive action -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="controls" align="center">NAMA</th>
                        <th class="controls" align="center">KATEGORI</th>
                        <th class="controls" align="center">BRAND</th>
                        <th class="controls" align="center">STOK</th>
                        <th class="controls" align="center">STATUS</th>
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($catalog)) {
                    foreach ($catalog as $row) {
                    $i = 1;
                        ?>
                        <tbody>
                            <tr>
                                <td ><?php echo $row['catalog_name']; ?></td>
                                <td >
                                    <?php
                                    foreach ($category as $key) {
                                        if ($key['catalog_catalog_id'] == $row['catalog_id']):
                                            if ($i > 1) {
                                                echo ', ';
                                            }
                                            echo $key['category_name'];
                                            $i++;
                                        endif;
                                    }
                                    ?>
                                </td>
                                <td ><?php echo $row['brand_name']; ?></td>
                                <td ><?php echo $row['catalog_real_stock']; ?></td>
                                <td ><?php echo ($row['catalog_for_sale'] == 0) ? 'Tidak dijual' : 'Dijual'; ?></td>
                                <td>
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/catalog/detail/' . $row['catalog_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/catalog/edit/' . $row['catalog_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                } else {
                    ?>
                    <tbody>
                        <tr id="row">
                            <td colspan="6" align="center">Data Kosong</td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>   
            </table>
        </div>
        <div >
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>