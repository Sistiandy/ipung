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

            <li><a><i class="fa fa-newspaper-o"></i> Posting <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/posts') ?>">Daftar Posting</a>
                    <li><a href="<?php echo site_url('admin/posts/category') ?>">Kategori Posting</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-newspaper-o"></i> Katalog <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/catalog') ?>">Daftar Katalog</a>
                    <li><a href="<?php echo site_url('admin/catalog/category') ?>">Kategori Katalog</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-newspaper-o"></i> Brand <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/catalog') ?>">Daftar Brand</a>
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

            <li><a><i class="fa fa-users"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/user') ?>">Daftar Pengguna</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->