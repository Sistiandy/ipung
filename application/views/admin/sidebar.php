<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin') ?>">Dashboard</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-caret-square-o-right"></i> Slide <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/slide') ?>">Daftar Slide</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-shopping-cart"></i> Katalog <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/catalog') ?>">Daftar Katalog</a>
                    <li><a href="<?php echo site_url('admin/catalog/category') ?>">Kategori Katalog</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-users"></i> Testimoni <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/testimoni') ?>">Daftar Testimoni</a>
                    </li>
                    <li><a href="<?php echo site_url('admin/testimoni/add') ?>">Tambah Testimoni</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-picture-o"></i> Media Manager <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/media_manager') ?>">Image List</a>
                    <li><a href="<?php echo site_url('admin/media_album') ?>">Album List</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-user"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/user') ?>">Daftar Pengguna</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->