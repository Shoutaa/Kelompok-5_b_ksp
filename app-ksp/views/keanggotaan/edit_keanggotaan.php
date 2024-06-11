<div class="container-fluid fixed">
		<div id="content">
<div class="separator"></div>
<?php 
foreach ($keanggotaan as $row);
$atribut=array('class'=>'form-horizontal','style'=>'margin-bottom: 0;');
echo form_open('',$atribut)?>
	
	<h4>Edit Kenanggotaan</h4>
	<hr class="separator line" />
	<div class="row-fluid">
		<div class="span6">
			
			<input type="hidden" name="id" value="<?php echo $row->id ?>">
			<div class="control-group">
				<label class="control-label" for="lastname">JENIS</label>
				<div class="controls">
					<input class="span12" id="lastname" name="jenis" type="text" value="<?php echo $row->jenis?>" required/>
					<?php echo form_error('jenis','<label class="label-warning">','</label>'); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="lastname">SIMPANAN POKOK</label>
				<div class="controls">
					<input class="span12" id="simpanan_pokok" name="simpanan_pokok" type="text" value="<?php echo $row->simpanan_pokok?>" required/>
					<?php echo form_error('simpanan_pokok','<label class="label-warning">','</label>'); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="simpanan_wajib">SIMPANAN WAJIB</label>
				<div class="controls">
					<input class="span12" id="simpanan_wajib" name="simpanan_wajib" type="text" value="<?php echo $row->simpanan_wajib?>" required/>
					<?php echo form_error('simpanan_wajib','<label class="label-warning">','</label>'); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="bunga_simpanan">BUNGA SIMPANAN</label>
				<div class="controls">
					<input class="span4" id="bunga_simpanan" name="bunga_simpanan" type="text" value="<?php echo $row->bunga_simpanan?>" required/> %
					<?php echo form_error('bunga_simpanan','<label class="label-warning">','</label>'); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="bunga_pinjaman">BUNGA PINJAMAN</label>
				<div class="controls">
					<input class="span4" id="bunga_pinjaman" name="bunga_pinjaman" type="text" value="<?php echo $row->bunga_pinjaman?>" required/> %
					<?php echo form_error('bunga_pinjaman','<label class="label-warning">','</label>'); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="denda_pinjaman">DENDA PINJAMAN</label>
				<div class="controls">
					<input class="span4" id="denda_pinjaman" name="denda_pinjaman" type="text" value="<?php echo $row->denda_pinjaman?>" required/> X Jasa Per Bulan
					<?php echo form_error('denda_pinjaman','<label class="label-warning">','</label>'); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="keterangan">KETERANGAN</label>
				<div class="controls">
					<input class="span12" id="keterangan" name="keterangan" type="text" value="<?php echo $row->keterangan?>" readonly/>
					<?php echo form_error('keterangan','<label class="label-warning">','</label>'); ?>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>SIMPAN</button>
		<button type="button" onClick="window.history.back()" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>KEMBALI</button>
	</div>
	
<?php echo form_close();?>