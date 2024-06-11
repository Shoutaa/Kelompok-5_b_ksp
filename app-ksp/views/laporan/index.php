<style type="text/css" media="print">
@media print {
    .noprint {display:none !important;}
    a:link:after, a:visited:after {  
      display: none;
      content: "";    
    }
}
</style>

<div class="container-fluid fixed">
	<div id="content">

<div class="widget widget-4 widget-body-white widget-tabs widget-tabs-2">
<?php //$this->load->view('template/menu_tab', array('hal'=>'simpanan'));?>
<br>
<?php $this->load->view('kop') ?>

<div class="heading-buttons">
	<div class="pull-left">
		<h4 class="heading"><?php
			// echo form_open('','method="get"');
			// // $default = ($this->input->get('per')) ? $this->input->get('per') : mdate('%Y-%m',now());
			// echo 'Jenis simpanan : '.form_dropdown('jenis', array(''=>'-- Semua --','Pokok'=>'Pokok','Wajib'=>'Wajib','Sukarela'=>'Sukarela','Bunga'=>'Bunga Simpanan' ), $this->input->get('jenis'), 'onChange="this.form.submit()"');
			// // echo form_close();
			?>
		</h4>
	</div>
	<div class="pull-right">
		<h4 class="heading"><?php
			$dropdown = $this->Laporan_model->getPeriode();
			echo form_open('','method="get"');
			$default = ($this->input->get('per')) ? $this->input->get('per') : date('Y-m');
			echo 'Periode : '.form_dropdown('per', $dropdown, $default, 'onChange="this.form.submit()"');
			// echo '   '.form_submit('export','Download', 'class="btn btn-warning"');
			echo form_close();
			?>
		</h4>
		<br>
		
	</div>
</div>


	<div class="widget-body" style="padding: 10px 0 0;">
		<table class="table table-striped table-bordered table-primary table-condensed">
			<thead>
				<tr>
					<th>NO_ANGGOTA</th>
					<th>Jenis_Transaksi</th>
					<th>KETERANGAN</th>
					<th>TANGGAL</th>
					<th style="text-align:right;">DEBET</th>
					<th style="text-align:right;">KREDIT</th>
					<!-- <th class="hidden-print">ACTION</th> -->
				</tr>
			</thead>
			<tbody>	
				<?php
					$kredit = $debet = 0; 
					foreach ($db as $key): 
				?>
					<tr>
						<td><?php echo $key->kode_nasabah ?></td>
						<td>
							<?php 
							if($key->tabel == 'simpanan') {
								echo anchor('main/simpanan/detail/'.$key->kode_nasabah, $key->tabel);
							}else{
								echo anchor('main/pinjaman/detail/'.$key->kode_nasabah, $key->tabel);
							}
							?>
						</td>
						<td><?php 
							if($key->tabel == 'cicilan' || $key->tabel == 'denda') {
								$ket = "Cicilan ke";
							}else if($key->tabel == 'pinjaman'){
								$ket = "Lama pinjaman";
							}else{
								$ket = '';
							}
							echo $ket.' '.$key->keterangan;
							?>
						</td>
						<td><?php echo $key->tanggal ?></td>
						<td style="text-align:right;"><?php if($key->debet){ echo buatrp($key->debet); $debet += $key->debet;} ?></td>
						<td style="text-align:right;"><?php if($key->kredit){ echo buatrp($key->kredit); $kredit += $key->kredit;}?></td>
					</tr>
				<?php endforeach; ?>
					<tr>
						<td colspan="4"><b>TOTAL</b></td>
						<td style="text-align:right;"><b><?php echo buatrp($debet) ?></b></td>
						<td style="text-align:right;"><b><?php echo buatrp($kredit) ?></b></td>
					</tr>
			</tbody>
		</table>
		<div class="visible-print pull-right">
			<br><br><br>Admin<br><br><br>
			<?php echo $this->session->userdata('nama'); ?>
			<br>
			<small>	<?php echo date('H:i:s d/m/Y') ?></small>
		</div>
	</div>
</div>

<?php 
function buatrp($angka){
        $jadi = "" . number_format($angka,2,',','.');
        return $jadi;
    }
 ?>
