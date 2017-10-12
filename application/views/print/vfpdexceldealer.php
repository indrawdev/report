<?php
	$d = $detail->row();
	$filename = 'tabel-fpd-dealer-'. strtolower($nama_cabang->fs_nama_cabang . '-'. $d->fs_namdel) .'.xls';
	date_default_timezone_set("Asia/Jakarta");
	header('Content-type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($filename).'"');
	header('Pragma: no-cache');
	header('Expires: 0');

	$tanggal_update = '1997-01-01';
	
	if (!empty($d->fd_tglupd)) {
		$tanggal_update = $d->fd_tglupd;
	}
?>
<h1 align="center">
	TABEL FPD DEALER - <?php echo $d->fs_namdel; ?>
	<br><?php echo strtoupper($tanggal_mulai) . ' s/d ' . strtoupper($tanggal_selesai); ?>
</h1>
<p align="center"><i>UPDATE PER TANGGAL - <?php echo date_format(date_create($tanggal_update), 'd/m/Y'); ?></i></p>
<table border="1" width="100%" cellpadding="3px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="10%" align="center"><strong>NO. KONTRAK</strong></th>
			<th width="20%" align="center"><strong>NAMA KONSUMEN</strong></th>
			<th width="20%" align="center"><strong>NAMA DEALER</strong></th>
			<th width="15%" align="center"><strong>SURVEYOR</strong></th>
			<th width="10%" align="center"><strong>TGL CAIR</strong></th>
			<th width="5%" align="center"><strong>ANGS KE</strong></th>
			<th width="7%" align="center"><strong>OVD</strong></th>
			<th width="10%" align="center"><strong>OS POKOK</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($detail->result() as $val) : ?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<th width="10%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<th width="20%" align="center"><?php echo $val->fs_nampem; ?></th>
			<th width="20%" align="center"><?php echo $val->fs_namdel; ?></th>
			<th width="15%" align="center"><?php echo $val->fs_ptgsvy; ?></th>
			<th width="10%" align="center"><?php echo date_format(date_create($val->fd_tglstj), 'd-m-Y'); ?></th>
			<th width="5%" align="center"><?php echo $val->fn_anggih; ?></th>
			<th width="7%" align="center"><?php echo $val->fn_lamovd; ?></th>
			<th width="10%" align="center"><?php echo number_format($val->fn_outnet); ?></th>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>