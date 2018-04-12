<?php
	$filename = 'tabel-aging-surveyor-'. $kategori . '-'. strtolower($nama_cabang->fs_nama_cabang) .'.xls';
	date_default_timezone_set('Asia/Jakarta');
	header('Content-type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($filename).'"');
	header('Pragma: no-cache');
	header('Expires: 0');

	$d = $detail->row();
	$tanggal_update = '1997-01-01';
	
	if (!empty($d->fd_tglupd)) {
		$tanggal_update = $d->fd_tglupd;
	}
?>
<h1 align="center">
	TABEL AGING SURVEYOR (<?php echo $kategori; ?>) - PENCAIRAN PERIODE (<?php echo strtoupper($tanggal_mulai) . ' s/d ' . strtoupper($tanggal_selesai); ?>)
</h1>
<p align="center"><i>UPDATE PER TANGGAL - <?php echo date_format(date_create($tanggal_update), 'd/m/Y'); ?></i></p>
<table border="1" width="100%" cellpadding="3px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>NO KONTRAK</strong></th>
			<th width="15%" align="center"><strong>NAMA KONSUMEN</strong></th>
			<th width="15%" align="center"><strong>NAMA KENDARAAN</strong></th>
			<th width="6%" align="center"><strong>THN KEND</strong></th>
			<th width="15%" align="center"><strong>NAMA DEALER</strong></th>
			<th width="3%" align="center"><strong>CMO</strong></th>
			<th width="6%" align="center"><strong>TGL CAIR</strong></th>
			<th width="5%" align="center"><strong>ANGS KE</strong></th>
			<th width="5%" align="center"><strong>TENOR</strong></th>
			<th width="8%" align="center"><strong>ANGSURAN</strong></th>
			<th width="8%" align="center"><strong>OS POKOK</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($detail->result() as $val) : ?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_kontrak; ?></td>
			<td width="15%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="15%" align="center"><?php echo $val->fs_model_kendaraan; ?></td>
			<td width="6%" align="center"><?php echo $val->fn_thnken; ?></td>
			<td width="15%" align="center"><?php echo $val->fs_namdel; ?></td>
			<td width="3%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="6%" align="center"><?php echo $val->fd_tglstj; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="8%" align="center"><?php echo number_format($val->fn_jlangd); ?></td>
			<td width="8%" align="center"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>