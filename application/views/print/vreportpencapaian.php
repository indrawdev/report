<h1 align="center">CABANG PERIODE (<?php echo strtoupper($periode_bulan); ?>)</h1>
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
		<?php foreach ($pencapaian->result() as $val) : ?>
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