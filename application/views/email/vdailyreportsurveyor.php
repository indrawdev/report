<!-- CABANG SUNTER -->
<h1 align="center">CABANG SUNTER - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_sunter->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG BSD -->
<h1 align="center">CABANG BSD - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_bsd->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG BOGOR -->
<h1 align="center">CABANG BOGOR - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_bogor->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG FATMAWATI 1 -->
<h1 align="center">CABANG FATMAWATI 1 - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_fatmawati1->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG CIBUBUR -->
<h1 align="center">CABANG CIBUBUR - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_cibubur->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG BANJARMASIN -->
<h1 align="center">CABANG BANJARMASIN - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_banjarmasin->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG PALANGKARAYA -->
<h1 align="center">CABANG PALANGKARAYA - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_palangkaraya->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG SAMPIT -->
<h1 align="center">CABANG SAMPIT - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_sampit->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG PANGKALANBUN -->
<h1 align="center">CABANG PANGKALANBUN - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_pangkalanbun->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG SURABAYA -->
<h1 align="center">CABANG SURABAYA - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_surabaya->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG BALI -->
<h1 align="center">CABANG BALI - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_bali->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG MANADO -->
<h1 align="center">CABANG MANADO - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_manado->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG TOMOHON -->
<h1 align="center">CABANG TOMOHON - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_tomohon->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG PANGKALPINANG -->
<h1 align="center">CABANG PANGKALPINANG - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_pangkalpinang->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG SUNGAILIAT -->
<h1 align="center">CABANG SUNGAILIAT - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_sungailiat->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG JAMBI -->
<h1 align="center">CABANG JAMBI - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_jambi->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG PALEMBANG -->
<h1 align="center">CABANG PALEMBANG - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_palembang->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG FATMAWATI 2 -->
<h1 align="center">CABANG FATMAWATI 2 - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_fatmawati2->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG JAKARTA 1 -->
<h1 align="center">CABANG JAKARTA 1 - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_jakarta1->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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
<br>
<!-- CABANG JAKARTA 2 -->
<h1 align="center">CABANG JAKARTA 2 - <?php echo strtoupper($tanggal_mulai . ' s/d ' . $tanggal_selesai); ?></h1>
<table border="1" align="left" width="100%" cellpadding="5px">
	<thead>
		<tr>
			<th width="5%" align="center"><strong>NO</strong></th>
			<th width="8%" align="center"><strong>CMO</strong></th>
			<th width="27%" align="center"><strong>NAMA SURVEYOR</strong></th>
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
		<?php foreach ($cabang_jakarta2->result() as $val) : ?>
		<?php
			$days = $val->fn_1_7 + $val->fn_8_15 + $val->fn_16_30 + $val->fn_31_60 + $val->fn_61_90 + $val->fn_91_120;
			$ovd = number_format(($days / $val->fn_total) * 100);
		?>
		<tr>
			<td width="5%" align="center"><?php echo $no; ?></td>
			<td width="8%" align="center"><?php echo $val->fs_ptgsvy; ?></td>
			<td width="27%" align="center"><?php echo $val->fs_nama_surveyor; ?></td>
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