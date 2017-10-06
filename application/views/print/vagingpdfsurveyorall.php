<?php
	date_default_timezone_set("Asia/Jakarta"); 

	$d = $aging_current;
	if (!empty($d->fd_tglupd)) {
		$tanggal_update = $d->fd_tglupd;
	} else {
		$tanggal_update = '-';
	}
?>
<h1 align="center">TABEL AGING SURVEYOR - (<?php echo $nama_cabang->fs_nama_cabang; ?>)</h1>
<p align="center"><i>UPDATE PER TANGGAL - <?php echo strtoupper(tanggal_indo($tanggal_update)); ?></i></p>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="100%" align="center">
				<strong>
					(<?php echo $nama_cabang->fs_nama_cabang; ?>) -
					<?php echo strtoupper($tanggal_mulai) . ' s/d ' . strtoupper($tanggal_selesai); ?>	
				</strong>
			</th>
		</tr>
		<tr>
			<th width="30%" align="center"><strong>KATEGORI AGING</strong></th>
			<th width="20%" align="center"><strong>UNIT</strong></th>
			<th width="50%" align="center"><strong>O/S POKOK</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="30%" align="center">CURRENT</td>
			<td width="20%" align="center"><?php echo $aging_current->fn_unit; ?></td>
			<td width="50%" align="center"><?php echo number_format($aging_current->fn_total_outnet); ?></td>
		</tr>
		<tr>
			<td width="30%" align="center">1-7 Hari</td>
			<td width="20%" align="center"><?php echo $aging_unit0->fn_unit; ?></td>
			<td width="50%" align="center"><?php echo number_format($aging_unit0->fn_total_outnet); ?></td>
		</tr>
		<tr>
			<td width="30%" align="center">8-15 Hari</td>
			<td width="20%" align="center"><?php echo $aging_unit7->fn_unit; ?></td>
			<td width="50%" align="center"><?php echo number_format($aging_unit7->fn_total_outnet); ?></td>
		</tr>
		<tr>
			<td width="30%" align="center">16-30 Hari</td>
			<td width="20%" align="center"><?php echo $aging_unit15->fn_unit; ?></td>
			<td width="50%" align="center"><?php echo number_format($aging_unit15->fn_total_outnet); ?></td>
		</tr>
		<tr>
			<td width="30%" align="center">31-60 Hari</td>
			<td width="20%" align="center"><?php echo $aging_unit30->fn_unit; ?></td>
			<td width="50%" align="center"><?php echo number_format($aging_unit30->fn_total_outnet); ?></td>
		</tr>
		<tr>
			<td width="30%" align="center">61-90 Hari</td>
			<td width="20%" align="center"><?php echo $aging_unit60->fn_unit; ?></td>
			<td width="50%" align="center"><?php echo number_format($aging_unit60->fn_total_outnet); ?></td>
		</tr>
		<tr>
			<td width="30%" align="center">91-120 Hari</td>
			<td width="20%" align="center"><?php echo $aging_unit90->fn_unit; ?></td>
			<td width="50%" align="center"><?php echo number_format($aging_unit90->fn_total_outnet); ?></td>
		</tr>
		<tr>
			<td width="30%" align="center">> 120 Hari</td>
			<td width="20%" align="center"><?php echo $aging_max->fn_unit; ?></td>
			<td width="50%" align="center"><?php echo number_format($aging_max->fn_total_outnet); ?></td>
		</tr>
		<tr>
			<td width="30%" align="center">TOTAL</td>
			<td width="20%" align="center"><?php echo $aging_total->fn_unit; ?></td>
			<td width="50%" align="center"><?php echo number_format($aging_total->fn_total_outnet); ?></td>
		</tr>
	</tbody>
</table>