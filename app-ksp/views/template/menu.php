<?php
// Periksa apakah pengguna adalah admin
$isAdmin = $this->session->userdata('level') == 'admin';
?>
<body>
<div class="navbar main hidden-print">
	<div class="container">
		<div class="row">
			<div class="span12 relativeWrap">
				<button type="button" class="btn btn-navbar visible-phone">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
				</button>

				<ul id="menu" class="hidden-phone">
					<li <?php if('nasabah'==$this->uri->segment(2)) echo 'class="active"';?>>
						<a href="<?php echo site_url('main/nasabah')?>" class="menuToggle">Nasabah</a>
					</li>
					<li <?php if('simpanan'==$this->uri->segment(2)) echo 'class="active"';?>>
						<a href="<?php echo site_url('main/simpanan')?>" class="menuToggle">Simpanan</a>
					</li>
					<li <?php if('pinjaman'==$this->uri->segment(2)) echo 'class="active"';?>>
						<a href="<?php echo site_url('main/pinjaman')?>" class="menuToggle">Pinjaman</a>
					</li>
					<li <?php if('laporan'==$this->uri->segment(1)) echo 'class="active"';?>>
						<a href="<?php echo site_url('laporan')?>" class="menuToggle">laporan</a>
					</li>
					
					<?php if($isAdmin){ ?>
					<li <?php if('user'==$this->uri->segment(2) || 'keanggotaan'==$this->uri->segment(2) || 'logo'==$this->uri->segment(1)) echo 'class="active"';?>>
						<a href="#" class="menuToggle">Pengaturan</a>
						<ul class="menu hide">
							<li <?php if('user'==$this->uri->segment(2)) echo 'class="active"';?>><a href="<?php echo site_url('main/user')?>"><span>Admin</span></a></li>
							<li <?php if('keanggotaan'==$this->uri->segment(2)) echo 'class="active"';?>><a href="<?php echo site_url('main/keanggotaan')?>">Keanggotaan</a></li>
							<!-- <li <?php if('backup_restore'==$this->uri->segment(2)) echo 'class="active"';?>><a href="<?php echo site_url('main/backup_restore')?>">Backup & Restore</a></li> -->
							<li <?php if('logo'==$this->uri->segment(1)) echo 'class="active"';?>><a href="<?php echo site_url('logo')?>">Lokasi</a></li>
						</ul>
					</li>
					<?php } ?>
				</ul>

				<span class="profile">
					<span>
						<strong><?php echo $this->session->userdata('nama')?></strong>
						<a href="<?php echo site_url('main/logout')?>">Keluar</a>
					</span>
				</span>
				
			</div>
		</div>
	</div>
</div>
