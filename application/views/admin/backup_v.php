<section class="content">
	<div class="jumborton">
		<h4>Membackup database dapat mengamankan data dari serangan hacker atau defacer ...	</h4>
	</div>

	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Backup</button>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header" style="background: green; color: white;">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Konfirmasi!!!</h4>
	      </div>
	      <div class="modal-body">
	        <p>Anda yakin ingin membackup database?</p>
	      </div>
	      <div class="modal-footer">
	        <a href="<?=base_url('Backup/backup')?>" class="btn btn-primary">Ya</a>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
	      </div>
	    </div>

	  </div>
	</div>
</section>

<!-- Trigger the modal with a button -->

<script type="text/javascript" src="<?=base_url('assets/js/jquery-3.1.0.min.js')?>"></script>

<script type="text/javascript">
	$(document).ready(function() {
		// $('#btn-backup').click(function() {
		// 	if (confirm('Yakin ingin bakcup database?')) {

		// 	}
		// });
	});
</script>