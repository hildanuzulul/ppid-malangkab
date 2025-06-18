<div class="sidebar bg-dark-red">
	<ul class="nav flex-column">
		<!-- <li class="nav-item">
			<a class="nav-link <?php echo $active_menu == 'dashboard' ? 'active' : ''; ?>" href="<?php echo base_url('admin'); ?>">
				<i class="fas fa-tachometer-alt me-2"></i> Dashboard
			</a>
		</li> -->
		<li class="nav-item">
			<a class="nav-link <?php echo $active_menu == 'informasi_dikecualikan' ? 'active' : ''; ?>" href="<?php echo base_url('admin_informasi_dikecualikan'); ?>">
				<i class="fas fa-file-excel me-2"></i> Informasi Dikecualikan
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php echo $active_menu == 'informasi' ? 'active' : ''; ?>" href="<?php echo base_url('admin_informasi'); ?>">
				<i class="fas fa-file me-2"></i> Informasi
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php echo $active_menu == 'lhkpn' ? 'active' : ''; ?>" href="<?php echo base_url('admin_lhkpn'); ?>">
				<i class="fas fa-sack-dollar me-2"></i> LHKPN
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php echo $active_menu == 'sop' ? 'active' : ''; ?>" href="<?php echo base_url('admin_sop'); ?>">
				<i class="fas fa-boxes me-2"></i> SOP
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php echo $active_menu == 'unduhan' ? 'active' : ''; ?>" href="<?php echo base_url('admin_unduhan'); ?>">
				<i class="fas fa-shopping-cart me-2"></i> Unduhan
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php echo $active_menu == 'situs_pd' ? 'active' : ''; ?>" href="<?php echo base_url('admin_situs_pd'); ?>">
				<i class="fas fa-cog me-2"></i> Situs PD
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php echo $active_menu == 'permintaan_data' ? 'active' : ''; ?>" href="<?php echo base_url('admin_permintaan_informasi'); ?>">
				<i class="fas fa-cog me-2"></i> Permintaan Data
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php echo $active_menu == 'kritik_saran' ? 'active' : ''; ?>" href="<?php echo base_url('admin_kritik_saran'); ?>">
				<i class="fas fa-cog me-2"></i> Kritik dan Saran
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('login/logout'); ?>" class="nav-link">
				<i class="fas fa-sign-out-alt me-2"></i> Logout
			</a>
		</li>
	</ul>
</div>