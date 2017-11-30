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
			$angs_tertunggak = 0;
			$angs_jatuhtempo = 0;
			
			if (date_format(date_create($val->fd_tgljtp), 'z') < date('z'))  {
				$angs_tertunggak = $val->fn_jlangd - $val->fn_jumbyr;
			} else {
				$angs_jatuhtempo = $val->fn_jlangd - $val->fn_jumbyr;
			}
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
			<td width="10%" align="right"><?php echo number_format($angs_tertunggak); ?></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="right"><?php echo number_format($angs_jatuhtempo); ?></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
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
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG BOGOR -->
<h1 align="center">CABANG BOGOR (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG FATMAWATI 1 -->
<h1 align="center">CABANG FATMAWATI 1 (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG CIBUBUR -->
<h1 align="center">CABANG CIBUBUR (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG BANJARMASIN -->
<h1 align="center">CABANG BANJARMASIN (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG PALANGKARAYA -->
<h1 align="center">CABANG PALANGKARAYA (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG SAMPIT -->
<h1 align="center">CABANG SAMPIT (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG PANGKALANBUN -->
<h1 align="center">CABANG PANGKALANBUN (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG SURABAYA -->
<h1 align="center">CABANG SURABAYA (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG BALI -->
<h1 align="center">CABANG BALI (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG MANADO -->
<h1 align="center">CABANG MANADO (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG TOMOHON -->
<h1 align="center">CABANG TOMOHON (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG PANGKALPINANG -->
<h1 align="center">CABANG PANGKALPINANG (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG JAMBI -->
<h1 align="center">CABANG JAMBI (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG PALEMBANG -->
<h1 align="center">CABANG PALEMBANG (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG FATMAWATI 2 -->
<h1 align="center">CABANG FATMAWATI 2 (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG JAKARTA 1 -->
<h1 align="center">CABANG JAKARTA 1 (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>
<!-- CABANG JAKARTA 2 -->
<h1 align="center">CABANG JAKARTA 2 (<?php echo strtoupper($periode_bulan); ?>)</h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="4%" align="center"><strong>No</strong></th>
			<th width="8%" align="center"><strong>Jatuh Tempo</strong></th>
			<th width="19%" align="center"><strong>Nama Konsumen</strong></th>
			<th width="6%" align="center"><strong>Angs. Ke</strong></th>
			<th width="5%" align="center"><strong>Tenor</strong></th>
			<th width="5%" align="center"><strong>OVD</strong></th>
			<th width="6%" align="center"><strong>OS Pokok</strong></th>
			<th width="9%" align="center"><strong>Angs. Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Denda Tertunggak</strong></th>
			<th width="10%" align="center"><strong>Angs. Jatuh Tempo</strong></th>
			<th width="9%" align="center"><strong>Total Kewajiban</strong></th>
			<th width="9%" align="center"><strong>Realisasi</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="4%" align="center"></td>
			<td width="8%" align="center"></td>
			<td width="19%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="5%" align="center"></td>
			<td width="6%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="10%" align="center"></td>
			<td width="9%" align="center"></td>
			<td width="9%" align="center"></td>
		</tr>
	</tbody>
</table>