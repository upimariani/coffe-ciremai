<footer>

</footer>
<!-- footer area end-->
</div>

<!-- offset area end -->
<!-- jquery latest version -->
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/popper.min.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/metisMenu.min.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/jquery.slicknav.min.js"></script>


<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<!-- others plugins -->
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/plugins.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/scripts.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
<script>
    console.log = function() {}
    $("#stok-bb").on('change', function() {

        $(".stok").html($(this).find(':selected').attr('data-stok'));
        $(".stok").val($(this).find(':selected').attr('data-stok'));

    });
</script>
</body>

</html>