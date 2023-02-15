<div style="position:fixed;right:20px;bottom:20px;">
    <a href="https://api.whatsapp.com/send?phone=628975775046&amp;text=Assalamualaikum%2C%0D%0AHalo%20Ka%20Admin%20%2AAKFAR%20Cefada%2A.%0D%0ANama%20Saya%20%3A%0D%0AAsal%20Sekolah%20%3A%0D%0AMau%20Tanya%20Ka%20%3A" target="_blank"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png"></a>
    <!-- <div class="user-block">
        <a href="https://wa.widget.web.id/5b7472" target="_blank"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png">
            <img class="" src="http://pmb.akfarcefada.ac.id/psb_cefada/asispanel/upload/wa.png"></a>
    </div> -->
</div>

<!-- Main Footer -->
<footer class="main-footer bg-navy">

    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        D3 FARMASI
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="https://akfarcefada.ac.id">TIM IT</a>.</strong> CEFADA.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/dist/js/adminlte.min.js"></script>
<script src="<?= base_url(); ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url(); ?>/plugins/moment/moment.min.js"></script>

<script src="<?= base_url(); ?>/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?= base_url(); ?>/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if (session()->getFlashdata('swal_icon')) { ?>
        Swal.fire({
            icon: '<?= session()->getFlashdata('swal_icon'); ?>',
            title: '<?= session()->getFlashdata('swal_title'); ?>',
            text: '<?= session()->getFlashdata('swal_text'); ?>',
        })
    <?php } ?>
</script>

<script>
    <?php if (session()->getFlashdata('toast_icon')) { ?>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: '<?= session()->getFlashdata('toast_icon'); ?>',
            title: '<?= session()->getFlashdata('toast_title'); ?>',
        })
    <?php } ?>
</script>

<script type="text/javascript">
    $("input").attr("autocomplete", "off");
</script>
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
<script>
    $(document).ready(function() {
        $(".tglcalendar").datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd-mm-yyyy"
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>
</body>

</html>