<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Testimoni
            <a href="<?php echo site_url('admin/testimoni/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>

        <!-- Indicates a successful or positive action -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="controls" align="center">NAMA</th>
                        <th class="controls" align="center">EMAIL</th>
                        <th class="controls" align="center">TANGGAL</th>
                        <th class="controls" align="center">STATUS</th>
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($testimoni)) {
                    foreach ($testimoni as $row) {
                        ?>
                        <tbody>
                            <tr>
                                <td ><?php echo $row['testimoni_user_name']; ?></td>
                                <td ><?php echo $row['testimoni_user_name']; ?></td>
                                <td ><?php echo pretty_date($row['testimoni_input_date'], 'l, d/m/Y', FALSE); ?></td>
                                <td ><?php echo ($row['testimoni_is_published'] == 0) ? 'Draft' : 'Terbit'; ?></td>
                                <td>
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/testimoni/detail/' . $row['testimoni_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/testimoni/edit/' . $row['testimoni_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                } else {
                    ?>
                    <tbody>
                        <tr id="row">
                            <td colspan="5" align="center">Data Kosong</td>
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