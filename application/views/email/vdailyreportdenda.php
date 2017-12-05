<!-- CABANG SUNTER -->
<h1 align="center">CABANG SUNTER - PERIODE (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_sunter->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table> 
<!-- CABANG BSD -->
<h1 align="center">CABANG BSD (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_bsd->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG BOGOR -->
<h1 align="center">CABANG BOGOR (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_bogor->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG FATMAWATI 1 -->
<h1 align="center">CABANG FATMAWATI 1 (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_fatmawati1->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG CIBUBUR -->
<h1 align="center">CABANG CIBUBUR (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_cibubur->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG BANJARMASIN -->
<h1 align="center">CABANG BANJARMASIN (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_banjarmasin->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG PALANGKARAYA -->
<h1 align="center">CABANG PALANGKARAYA (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_palangkaraya->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG SAMPIT -->
<h1 align="center">CABANG SAMPIT (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_sampit->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG PANGKALANBUN -->
<h1 align="center">CABANG PANGKALANBUN (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_pangkalanbun->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG SURABAYA -->
<h1 align="center">CABANG SURABAYA (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_surabaya->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG BALI -->
<h1 align="center">CABANG BALI (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_bali->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG MANADO -->
<h1 align="center">CABANG MANADO (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_manado->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG TOMOHON -->
<h1 align="center">CABANG TOMOHON (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_tomohon->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG PANGKALPINANG -->
<h1 align="center">CABANG PANGKALPINANG (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_pangkalpinang->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG JAMBI -->
<h1 align="center">CABANG JAMBI (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_jambi->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG PALEMBANG -->
<h1 align="center">CABANG PALEMBANG (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_palembang->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG FATMAWATI 2 -->
<h1 align="center">CABANG FATMAWATI 2 (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_fatmawati2->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG JAKARTA 1 -->
<h1 align="center">CABANG JAKARTA 1 (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_jakarta1->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<!-- CABANG JAKARTA 2 -->
<h1 align="center">CABANG JAKARTA 2 (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="3%" align="center"><strong>NO</strong></th>
			<th width="6%" align="center"><strong>JTH TEMPO</strong></th>
			<th width="7%" align="center"><strong>KONTRAK</strong></th>
			<th width="17%" align="center"><strong>KONSUMEN</strong></th>
			<th width="5%" align="center"><strong>ANGS. KE</strong></th>
			<th width="4%" align="center"><strong>TENOR</strong></th>
			<th width="3%" align="center"><strong>OVD</strong></th>
			<th width="7%" align="center"><strong>OS POKOK</strong></th>
			<th width="10%" align="center"><strong>ANGS. TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>DENDA TERTUNGGAK</strong></th>
			<th width="10%" align="center"><strong>ANGS. JATUH TEMPO</strong></th>
			<th width="9%" align="center"><strong>TOTAL KEWAJIBAN</strong></th>
			<th width="9%" align="center"><strong>REALISASI</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($cabang_jakarta2->result() as $val) : ?>
		<?php
			$total = $val->fn_sisabyr + $val->fn_jlsisa + $val->fn_sisabyr1 + $val->fn_jumlah;
		?>
		<tr>
			<td width="3%" align="center"><?php echo $no; ?></td>
			<td width="6%" align="center"><?php echo date_format(date_create($val->fd_tgljtp), 'd/m/Y'); ?></td>
			<th width="7%" align="center"><?php echo $val->fs_kontrak; ?></th>
			<td width="17%" align="center"><?php echo $val->fs_nampem; ?></td>
			<td width="5%" align="center"><?php echo $val->fn_anggih; ?></td>
			<td width="4%" align="center"><?php echo $val->fn_lamang; ?></td>
			<td width="3%" align="center"><?php echo $val->fn_lamovd; ?></td>
			<td width="7%" align="right"><?php echo number_format($val->fn_outnet); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr); ?></td>
			<td width="10%" align="center"><?php echo number_format($val->fn_jlsisa); ?></td>
			<td width="10%" align="right"><?php echo number_format($val->fn_sisabyr1); ?></td>
			<td width="9%" align="center"><?php echo number_format($total); ?></td>
			<td width="9%" align="center"><?php echo number_format($val->fn_jumlah); ?></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>