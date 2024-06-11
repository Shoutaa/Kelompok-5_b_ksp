<?php 
foreach ($kop as $key){
	$logo[$key['attr']] = $key['value'];
}?>
<!-- KOP -->
	<table class="visible-print">
		<tr>
			<td>
				<img style="float:left" width="70" height="70" src="<?php echo base_url('assets/'.$logo['kop_koperasi']) ?>">
			</td>
			<td>
				<div style="font-size: 18px;text-align: center;vertical-align:middle;padding:20px;">
					<?php echo nl2br($logo['kop_text']) ?></div>
			</td>
			<td>
				<img style="float:right" width="70" height="70" src="<?php echo base_url('assets/'.$logo['kop_logo']) ?>">
			</td>
		</tr>
	</table>
<!-- END KOP -->