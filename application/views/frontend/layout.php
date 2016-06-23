<?php $this->load->view('frontend/header') ?>
<?php isset($main) ? $this->load->view($main) : null; ?>
<?php $this->load->view('frontend/footer') ?>