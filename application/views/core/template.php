<!DOCTYPE html>
<html lang="es">
    <head>
        <?php $this->load->view('core/header'); ?>
    </head>

    <body id="<?php if(!$this->session->userdata('usuario_id')) echo 'page-top'; ?>" class="<?php if(!$this->session->userdata('usuario_id')) echo 'bg-gradient-primary'; ?>">
        <?php if($this->session->userdata('usuario_id')) { ?>
            <div id="wrapper">
                <?php $this->load->view('core/sidebar'); ?>

                <div id="content-wrapper" class="d-flex flex-column">
                    <!-- Main Content -->
                    <div id="content">
                        <?php $this->load->view('core/topbar'); ?>

                        <?php $this->load->view($contenido_principal); ?>
                    </div>

                    <?php $this->load->view('core/footer'); ?>
                </div>
            </div>
        <?php } else { ?>
            <?php $this->load->view($contenido_principal); ?>
        <?php } ?>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url(); ?>js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?php echo base_url(); ?>vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo base_url(); ?>js/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url(); ?>js/demo/chart-pie-demo.js"></script>
    </body>
</html>