<?php date_default_timezone_set("Asia/Jakarta"); ?>
<h1 align="center">
	TABEL AGING SURVEYOR (<?php echo $kategori?>)
</h1>
<table border="1" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th align="center">No</th>
			<th align="center">No Kontrak</th>
			<th align="center">Nama</th>
			<th align="center">Nama Kend</th>
			<th align="center">Tahun Kend</th>
			<th align="center">Tanggal Cair</th>
			<th align="center">Angsuran Ke</th>
			<th align="center">Tenor</th>
			<th align="center">PH</th>
			<th align="center">OS Pokok</th>
			<th align="center">Ovd Hari</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach ($agings->result() as $key) : ?>
		<tr>
			<td align="center"><?php echo $no; ?></td>
			<td align="center"><?php echo $key->fn_kodelk . $key->fn_nomdel . $key->fs_jenpiu . $key->fn_polpen . $key->fn_nompjb; ?></td>
			<td align="center"><?php echo $key->fs_nampem; ?></td>
			<td align="center">-</td>
			<td align="center"><?php echo $key->fn_thnken; ?></td>
			<td align="center"><?php echo $key->fd_tglstj; ?></td>
			<td align="center"><?php echo $key->fn_anggih; ?></td>
			<td align="center"><?php echo $key->fn_lamang; ?></td>
			<td align="center"><?php echo $key->fn_juhang - $key->fn_biangd; ?></td>
			<td></td>
			<td></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>
	</tbody>
</table>