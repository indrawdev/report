<?php
	date_default_timezone_set("Asia/Jakarta"); 

	$d = $all->row();
	$tanggal_update = '1997-01-01';
	if (!empty($d->fd_tglupd)) {
		$tanggal_update = $d->fd_tglupd;
	}
?>
<h1 align="center">TABEL FPD SURVEYOR - (<?php echo $nama_cabang->fs_nama_cabang; ?>)</h1>
<p align="center"><i>UPDATE PER TANGGAL - <?php echo date_format(date_create($tanggal_update), 'd/m/Y'); ?></i></p>

<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="100%" align="center">
				<strong>
					<?php echo strtoupper($tanggal_mulai) . ' s/d ' . strtoupper($tanggal_selesai); ?>	
				</strong>
			</th>
		</tr>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="10%" align="center"><strong>CMO</strong></th>
			<th width="25%" align="center"><strong>NAMA SURVEYOR</strong></th>
			<th width="6%" align="center"><strong>CURRENT</strong></th>
			<th width="6%" align="center"><strong>1-7</strong></th>
			<th width="6%" align="center"><strong>8-15</strong></th>
			<th width="6%" align="center"><strong>16-30</strong></th>
			<th width="6%" align="center"><strong>31-60</strong></th>
			<th width="6%" align="center"><strong>61-90</strong></th>
			<th width="6%" align="center"><strong>91-120</strong></th>
			<th width="6%" align="center"><strong>> 120</strong></th>
			<th width="7%" align="center"><strong>TOTAL</strong></th>
			<th width="5%" align="center"><strong>OVD %</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($all->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="10%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="25%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
			<td width="6%" align="center"><?php echo $val->fn_current; ?></td>
			<td width="6%" align="center"><?php echo $val->fn_1_7; ?></td>
			<td width="6%" align="center"><?php echo $val->fn_8_15; ?></td>
			<td width="6%" align="center"><?php echo $val->fn_16_30; ?></td>
			<td width="6%" align="center"><?php echo $val->fn_31_60; ?></td>
			<td width="6%" align="center"><?php echo $val->fn_61_90; ?></td>
			<td width="6%" align="center"><?php echo $val->fn_91_120; ?></td>
			<td width="6%" align="center"><?php echo $val->fn_max; ?></td>
			<td width="7%" align="center"><?php echo $val->fn_total; ?></td>
			<td width="5%" align="center"><?php echo $ovd . '%'; ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>