</div>

<!-- Logout Modal-->
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->

<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url()?>assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url()?>assets/js/main.js"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url()?>assets/js/demo/datatables-demo.js"></script>
<?php// if ($this->session->userdata('typeId') == 1):?>
<!--<script src="--><?php //echo base_url()?><!--assets/js/demo/chart-bar-demo.js"></script>-->
<?php// endif?>
</body>
</html>
