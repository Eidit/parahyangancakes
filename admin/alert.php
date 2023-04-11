<?php if(isset($_GET["failed"])) {?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      Proses simpan <strong>gagal</strong>!. Field tidak boleh kosong.
    </div>
  <?php } ?>