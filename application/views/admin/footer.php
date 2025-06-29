        <!-- Footer -->
        <footer class="footer text-center py-3">
        	<div class="container-fluid">
        		<span>&copy; 2025 Dinas Komunikasi dan Informatika Kabupaten Malang.</span>
        	</div>
        </footer>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/js/admin.js'); ?>"></script>
        <script>
        	var myModal = document.getElementById('myModal')
        	var myInput = document.getElementById('myInput')

        	myModal.addEventListener('shown.bs.modal', function() {
        		myInput.focus()
        	})
        </script>
        <script>
        	<?php if ($this->session->flashdata('success')): ?>
        		Swal.fire({
        			icon: 'success',
        			title: 'Berhasil!',
        			text: '<?= $this->session->flashdata('success'); ?>'
        		});
        	<?php elseif ($this->session->flashdata('error')): ?>
        		Swal.fire({
        			icon: 'error',
        			title: 'Gagal!',
        			text: '<?= $this->session->flashdata('error'); ?>'
        		});
        	<?php elseif ($this->session->flashdata('error_modal')): ?>
        		Swal.fire({
        			icon: 'error',
        			title: 'Gagal!',
        			html: '<?= $this->session->flashdata('error_modal'); ?>'
        		});
        	<?php endif; ?>
        </script>
        <script>
        	document.getElementById('btn-simpan').addEventListener('click', function(e) {
        		Swal.fire({
        			title: 'Yakin ingin simpan?',
        			text: "Pastikan data sudah benar. Data yang sudah disimpan tidak bisa diubah dan akan dikirim kepada pemohon.",
        			icon: 'warning',
        			showCancelButton: true,
        			confirmButtonColor: '#3085d6',
        			cancelButtonColor: '#d33',
        			confirmButtonText: 'Ya, simpan!',
        			cancelButtonText: 'Batal'
        		}).then((result) => {
        			if (result.isConfirmed) {
        				// Submit form jika user setuju
        				document.getElementById('form-simpan').submit();
        			}
        		});
        	});
        </script>
        <?php if (validation_errors()): ?>
        	<script>
        		$(document).ready(function() {
        			$('#exampleModal').modal('show'); // Ganti dengan ID modal kamu
        		});
        	</script>
        <?php endif; ?>
        </body>

        </html>