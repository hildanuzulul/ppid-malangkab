<?php foreach ($sidebar_berita as $item): ?>
	<li>
		<div class="image-box">
			<img src="<?= $item['gambar'] ?>" onerror="this.onerror=null;this.src='<?= base_url('assets/uploads/notfound.jpg') ?>';">
		</div>
		<div>
			<p><?= htmlentities($item['judul_artikel']) ?></p>
			<span><?= date('Y-m-d H:i:s', strtotime($item['created_at'])) ?></span>
		</div>
	</li>
	<hr>
<?php endforeach; ?>