Ext.Loader.setConfig({
	enabled: true
});

Ext.Loader.setPath('Ext.ux', gBaseUX);

Ext.require([
	'Ext.ux.form.NumericField',
	'Ext.ux.ProgressBarPager',
	'Ext.ProgressBar',
	'Ext.view.View',
]);

Ext.onReady(function() {
	Ext.QuickTips.init();
	Ext.util.Format.thousandSeparator = ',';
	Ext.util.Format.decimalSeparator = '.';

	var required = '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>';

	Ext.define('DataGridHeader', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_header', type: 'string'},
			{name: 'fs_jenis_pelapor', type: 'string'},
			{name: 'fs_kode_pelapor', type: 'string'}
		]
	});

	Ext.define('DataGridIndividu', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fs_jenis_identitas', type: 'string'},
			{name: 'fs_nomor_identitas', type: 'string'},
		]
	});

	Ext.define('DataGridBadanUsaha', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fs_identitas_badanusaha', type: 'string'},
			{name: 'fs_nama_badanusaha', type: 'string'},
		]
	});

	Ext.define('DataGridKredit', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_no_rekening', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fs_sifat_pembiayaan', type: 'string'},
			{name: 'fs_jenis_pembiayaan', type: 'string'},
		]
	});

	Ext.define('DataGridKreditJoinAcc', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_no_rekening', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fs_sifat_pembiayaan', type: 'string'},
			{name: 'fs_jenis_pembiayaan', type: 'string'},
		]
	});

	Ext.define('DataGridSuratBerharga', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_no_rekening', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fs_jenis_suratberharga', type: 'string'},
			{name: 'fs_sovereign_rate', type: 'string'},
		]
	});

	Ext.define('DataGridIrrevocable', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_no_rekening', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fs_jenis_lc', type: 'string'},
			{name: 'fs_tujuan_lc', type: 'string'},
		]
	});

	Ext.define('DataGridBankGaransi', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_no_rekening', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fs_jenis_garansi', type: 'string'},
			{name: 'fs_tujuan_garansi', type: 'string'},
		]
	});

	Ext.define('DataGridFasilitasLain', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_no_rekening', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fs_jenis_fasilitas', type: 'string'},
			{name: 'fs_sumber_dana', type: 'string'},
		]
	});

	Ext.define('DataGridAgunan', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_no_rekening', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fs_jenis_segmen', type: 'string'},
			{name: 'fs_status_agunan', type: 'string'},
		]
	});

	Ext.define('DataGridPenjamin', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_identitas_penjamin', type: 'string'},
			{name: 'fs_no_rekening', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fs_jenis_segmen', type: 'string'},
			{name: 'fs_jenis_identitas', type: 'string'},
		]
	});

	Ext.define('DataGridPengurus', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_identitas_pengurus', type: 'string'},
			{name: 'fs_no_rekening', type: 'string'},
			{name: 'fs_jenis_identitas', type: 'string'},
			{name: 'fs_nama_pengurus', type: 'string'},
			{name: 'fs_jenis_kelamin', type: 'string'},
		]
	});

	Ext.define('DataGridLaporanKeuangan', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_flag_detail', type: 'string'},
			{name: 'fs_nomor_debitur', type: 'string'},
			{name: 'fd_posisi_keuangan_tahunan', type: 'string'},
			{name: 'fn_aset', type: 'string'},
			{name: 'fn_aset_lancar', type: 'string'},
			{name: 'fn_setara_kas', type: 'string'},
		]
	});

	// STORES
	var grupHeader = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridHeader',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridheader'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari1').getValue()
				});
			}
		}		
	});

	var grupIndividu = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridIndividu',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridindividu'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari2').getValue()
				});
			}
		}		
	});

	var grupBadanUsaha = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridBadanUsaha',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridbadanusaha'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari3').getValue()
				});
			}
		}		
	});

	var grupKredit = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridKredit',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridkredit'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari4').getValue()
				});
			}
		}		
	});

	var grupKreditJoinAcc = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridKreditJoinAcc',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridkreditjoinacc'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari5').getValue()
				});
			}
		}		
	});

	var grupKreditJoinAcc = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridKreditJoinAcc',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridkreditjoinacc'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari6').getValue()
				});
			}
		}		
	});

	var grupSuratBerharga = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridSuratBerharga',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridsuratberharga'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari7').getValue()
				});
			}
		}		
	});

	var grupIrrevocable = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridIrrevocable',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridirrevocable'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari8').getValue()
				});
			}
		}		
	});

	var grupBankGaransi = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridBankGaransi',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridbankgaransi'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari9').getValue()
				});
			}
		}		
	});

	var grupFasilitasLain = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridFasilitasLain',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridfasilitaslain'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari10').getValue()
				});
			}
		}		
	});

	var grupAgunan = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridAgunan',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridagunan'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari11').getValue()
				});
			}
		}		
	});

	var grupPenjamin = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridPenjamin',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridpenjamin'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari12').getValue()
				});
			}
		}		
	});

	var grupPengurus = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridPengurus',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridpengurus'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari13').getValue()
				});
			}
		}		
	});

	var grupLaporan = Ext.create('Ext.data.Store', {
		autoLoad: true,
		model: 'DataGridLaporanKeuangan',
		pageSize: 25,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json'
			},
			type: 'ajax',
			url: 'slik/gridlaporan'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCari14').getValue()
				});
			}
		}		
	});

	// GRIDS
	var gridHeader = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupHeader,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Jenis Pelapor',
			dataIndex: 'fs_jenis_pelapor',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Pelapor',
			dataIndex: 'fs_kode_pelapor',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Jumlah File',
			dataIndex: 'fn_jumlah_file',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'Jumlah Segmen',
			dataIndex: 'fn_jumlah_segmen',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupHeader
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridIndividu = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupIndividu,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_nomor_debitur',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Nama Lengkap',
			dataIndex: 'fs_nama_lengkap',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupIndividu
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridBadanUsaha = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupBadanUsaha,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_nomor_debitur',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Nama Badan Usaha',
			dataIndex: 'fs_nama_badanusaha',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupBadanUsaha
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridKredit = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupKredit,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Rekening',
			dataIndex: 'fs_no_rekening',
			menuDisabled: true,
			flex: 1
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_nomor_debitur',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupKredit
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridKreditJoinAcc = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupKreditJoinAcc,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Rekening',
			dataIndex: 'fs_no_rekening',
			menuDisabled: true,
			flex: 1
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_nomor_debitur',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupKreditJoinAcc
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridSuratBerharga = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupSuratBerharga,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Rekening',
			dataIndex: 'fs_no_rekening',
			menuDisabled: true,
			flex: 1
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_nomor_debitur',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupSuratBerharga
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridIrrevocable = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupIrrevocable,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Rekening',
			dataIndex: 'fs_no_rekening',
			menuDisabled: true,
			flex: 1
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_nomor_debitur',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupSuratBerharga
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridBankGaransi = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupBankGaransi,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Rekening',
			dataIndex: 'fs_no_rekening',
			menuDisabled: true,
			flex: 1
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_nomor_debitur',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupSuratBerharga
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridFasilitasLain = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupFasilitasLain,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Rekening',
			dataIndex: 'fs_no_rekening',
			menuDisabled: true,
			flex: 1
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_nomor_debitur',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupFasilitasLain
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridAgunan = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupAgunan,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Rekening',
			dataIndex: 'fs_no_rekening',
			menuDisabled: true,
			flex: 1
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_nomor_debitur',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupAgunan
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridPenjamin = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupPenjamin,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_no_rekening',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Nama Penjamin',
			dataIndex: 'fs_nama_lengkap',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupPenjamin
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridPengurus = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupPengurus,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Rekening',
			dataIndex: 'fs_no_rekening',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Nama Pengurus',
			dataIndex: 'fs_nama_pengurus',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupPengurus
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridLaporan = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 400,
		sortableColumns: false,
		store: grupLaporan,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.5
		},{
			text: 'No. Debitur',
			dataIndex: 'fs_nomor_debitur',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Aset',
			dataIndex: 'fn_aset',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Piutang Pembiayaan',
			dataIndex: 'fn_piutang_pembiayaan_aset_lancar',
			menuDisabled: true,
			flex: 1
		},{
			text: 'Data',
			dataIndex: 'fs_operasi_data',
			menuDisabled: true,
			flex: 0.5
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupLaporan
		}),
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	// FUNCTIONS
	function fnHeader() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'HEADER',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnIndividu() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'DEBITUR INDIVIDU',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnBadanUsaha() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'DEBITUR BADAN USAHA',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnKredit() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'KREDIT',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnKreditJoinAcc() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'KREDIT JOIN ACCOUNT',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnSuratBerharga() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'SURAT BERHARGA',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnIrrevocable() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'IRREVOCABLE',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnBankGaransi() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'BANK GARANSI',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnFasilitasLain() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'FASILITAS LAIN',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnAgunan() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'AGUNAN',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnPenjamin() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'PENJAMIN',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnPengurus() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'PENGURUS',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	function fnLaporan() {
		var winInfo = Ext.create('Ext.window.Window', {
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'LAPORAN KEUANGAN',
			width: 300,
			items: [],
			buttons: [{
				href: '',
				hrefTarget: '_blank',
				text: 'Download (TXT) File',
				xtype: 'button'
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					winInfo.hide();
				}
			}]
		}).show();
	}

	var frmSLIK = Ext.create('Ext.form.Panel', {
		border: false,
		frame: true,
		region: 'center',
		title: 'Sistem Layanan Informasi Keuangan',
		width: 930,
		items: [{
			activeTab: 0,
			bodyStyle: 'padding: 5px; background-color: '.concat(gBasePanel),
			border: false,
			plain: true,
			xtype: 'tabpanel',
			items: [{
				id: 'tab1',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Header',
				xtype: 'form',
				items: [{
					fieldDefaults: {
						labelAlign: 'right',
						labelSeparator: '',
						labelWidth: 140,
						msgTarget: 'side'
					},
					anchor: '100%',
					style: 'padding: 5px;',
					title: 'Data Header',
					xtype: 'fieldset',
					items: [
						gridHeader
					]
				}],
				buttons: [{
					iconCls: 'icon-print',
					id: 'btnFile1',
					name: 'btnFile1',
					text: 'File',
					scale: 'medium',
					handler: fnHeader
				}]
			},{
				id: 'tab2',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Debitur',
				xtype: 'form',
				items: [{
					activeTab: 0,
					bodyStyle: 'padding: 5px; background-color: '.concat(gBasePanel),
					border: false,
					plain: true,
					xtype: 'tabpanel',
					items: [{
						id: 'tab2-1',
						bodyStyle: 'background-color: '.concat(gBasePanel),
						border: false,
						frame: false,
						title: 'Individu',
						xtype: 'form',
						items: [{
							fieldDefaults: {
								labelAlign: 'right',
								labelSeparator: '',
								labelWidth: 140,
								msgTarget: 'side'
							},
							anchor: '100%',
							style: 'padding: 5px;',
							title: 'Data Debitur Individu',
							xtype: 'fieldset',
							items: [
								gridIndividu
							]
						}],
						buttons: [{
							iconCls: 'icon-print',
							id: 'btnFile2',
							name: 'btnFile2',
							text: 'File',
							scale: 'medium',
							handler: fnIndividu
						}]
					},{
						id: 'tab2-2',
						bodyStyle: 'background-color: '.concat(gBasePanel),
						border: false,
						frame: false,
						title: 'Badan Usaha',
						xtype: 'form',
						items: [{
							fieldDefaults: {
								labelAlign: 'right',
								labelSeparator: '',
								labelWidth: 140,
								msgTarget: 'side'
							},
							anchor: '100%',
							style: 'padding: 5px;',
							title: 'Data Debitur Badan Usaha',
							xtype: 'fieldset',
							items: [
								gridBadanUsaha
							]
						}],
						buttons: [{
							iconCls: 'icon-print',
							id: 'btnFile3',
							name: 'btnFile3',
							text: 'File',
							scale: 'medium',
							handler: fnBadanUsaha
						}]
					}]
				}]
			},{
				id: 'tab3',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Kredit',
				xtype: 'form',
				items: [{
					activeTab: 0,
					bodyStyle: 'padding: 5px; background-color: '.concat(gBasePanel),
					border: false,
					plain: true,
					xtype: 'tabpanel',
					items: [{
						id: 'tab3-1',
						bodyStyle: 'background-color: '.concat(gBasePanel),
						border: false,
						frame: false,
						title: 'Kredit',
						xtype: 'form',
						items: [{
							fieldDefaults: {
								labelAlign: 'right',
								labelSeparator: '',
								labelWidth: 140,
								msgTarget: 'side'
							},
							anchor: '100%',
							style: 'padding: 5px;',
							title: 'Data Kredit',
							xtype: 'fieldset',
							items: [
								gridKredit
							]
						}],
						buttons: [{
							iconCls: 'icon-print',
							id: 'btnFile4',
							name: 'btnFile4',
							text: 'File',
							scale: 'medium',
							handler: fnKredit
						}]
					},{
						id: 'tab3-2',
						bodyStyle: 'background-color: '.concat(gBasePanel),
						border: false,
						frame: false,
						title: 'Kredit Join Account',
						xtype: 'form',
						items: [{
							fieldDefaults: {
								labelAlign: 'right',
								labelSeparator: '',
								labelWidth: 140,
								msgTarget: 'side'
							},
							anchor: '100%',
							style: 'padding: 5px;',
							title: 'Data Kredit Join Account',
							xtype: 'fieldset',
							items: [
								gridKreditJoinAcc
							]
						}],
						buttons: [{
							iconCls: 'icon-print',
							id: 'btnFile5',
							name: 'btnFile5',
							text: 'File',
							scale: 'medium',
							handler: fnKreditJoinAcc
						}]
					}]
				}]
			},{
				id: 'tab4',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Surat Berharga',
				xtype: 'form',
				items: [{
					fieldDefaults: {
						labelAlign: 'right',
						labelSeparator: '',
						labelWidth: 140,
						msgTarget: 'side'
					},
					anchor: '100%',
					style: 'padding: 5px;',
					title: 'Data Surat Berharga',
					xtype: 'fieldset',
					items: [
						gridSuratBerharga
					]
				}],
				buttons: [{
					iconCls: 'icon-print',
					id: 'btnFile6',
					name: 'btnFile6',
					text: 'File',
					scale: 'medium',
					handler: fnSuratBerharga
				}]
			},{
				id: 'tab5',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Irrevocable LC',
				xtype: 'form',
				items: [{
					fieldDefaults: {
						labelAlign: 'right',
						labelSeparator: '',
						labelWidth: 140,
						msgTarget: 'side'
					},
					anchor: '100%',
					style: 'padding: 5px;',
					title: 'Data Irrevocable LC',
					xtype: 'fieldset',
					items: [
						gridIrrevocable
					]
				}],
				buttons: [{
					iconCls: 'icon-print',
					id: 'btnFile7',
					name: 'btnFile7',
					text: 'File',
					scale: 'medium',
					handler: fnIrrevocable
				}]
			},{
				id: 'tab6',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Bank Garansi',
				xtype: 'form',
				items: [{
					fieldDefaults: {
						labelAlign: 'right',
						labelSeparator: '',
						labelWidth: 140,
						msgTarget: 'side'
					},
					anchor: '100%',
					style: 'padding: 5px;',
					title: 'Data Bank Garansi',
					xtype: 'fieldset',
					items: [
						gridBankGaransi
					]
				}],
				buttons: [{
					iconCls: 'icon-print',
					id: 'btnFile8',
					name: 'btnFile8',
					text: 'File',
					scale: 'medium',
					handler: fnBankGaransi
				}]
			},{

				id: 'tab7',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Fasilitas Lain',
				xtype: 'form',
				items: [{
					fieldDefaults: {
						labelAlign: 'right',
						labelSeparator: '',
						labelWidth: 140,
						msgTarget: 'side'
					},
					anchor: '100%',
					style: 'padding: 5px;',
					title: 'Data Fasilitas Lainnya',
					xtype: 'fieldset',
					items: [
						gridFasilitasLain
					]
				}],
				buttons: [{
					iconCls: 'icon-print',
					id: 'btnFile9',
					name: 'btnFile9',
					text: 'File',
					scale: 'medium',
					handler: fnFasilitasLain
				}]
			},{
				id: 'tab8',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Agunan',
				xtype: 'form',
				items: [{
					fieldDefaults: {
						labelAlign: 'right',
						labelSeparator: '',
						labelWidth: 140,
						msgTarget: 'side'
					},
					anchor: '100%',
					style: 'padding: 5px;',
					title: 'Data Agunan',
					xtype: 'fieldset',
					items: [
						gridAgunan
					]
				}],
				buttons: [{
					iconCls: 'icon-print',
					id: 'btnFile10',
					name: 'btnFile10',
					text: 'File',
					scale: 'medium',
					handler: fnAgunan
				}]
			},{
				id: 'tab9',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Penjamin',
				xtype: 'form',
				items: [{
					fieldDefaults: {
						labelAlign: 'right',
						labelSeparator: '',
						labelWidth: 140,
						msgTarget: 'side'
					},
					anchor: '100%',
					style: 'padding: 5px;',
					title: 'Data Penjamin',
					xtype: 'fieldset',
					items: [
						gridPenjamin
					]
				}],
				buttons: [{
					iconCls: 'icon-print',
					id: 'btnFile11',
					name: 'btnFile11',
					text: 'File',
					scale: 'medium',
					handler: fnPenjamin
				}]
			},{
				id: 'tab10',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Pengurus',
				xtype: 'form',
				items: [{
					fieldDefaults: {
						labelAlign: 'right',
						labelSeparator: '',
						labelWidth: 140,
						msgTarget: 'side'
					},
					anchor: '100%',
					style: 'padding: 5px;',
					title: 'Data Pengurus',
					xtype: 'fieldset',
					items: [
						gridPengurus
					]
				}],
				buttons: [{
					iconCls: 'icon-print',
					id: 'btnFile12',
					name: 'btnFile12',
					text: 'File',
					scale: 'medium',
					handler: fnPengurus
				}]
			},{
				id: 'tab11',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Laporan',
				xtype: 'form',
				items: [{
					fieldDefaults: {
						labelAlign: 'right',
						labelSeparator: '',
						labelWidth: 140,
						msgTarget: 'side'
					},
					anchor: '100%',
					style: 'padding: 5px;',
					title: 'Data Laporan Keuangan',
					xtype: 'fieldset',
					items: [
						gridLaporan
					]
				}],
				buttons: [{
					iconCls: 'icon-print',
					id: 'btnFile13',
					name: 'btnFile13',
					text: 'File',
					scale: 'medium',
					handler: fnLaporan
				}]
			}]
		}]
	});

	var vMask = new Ext.LoadMask({
		msg: 'Please wait...',
		target: frmSLIK
	});

	function fnMaskShow() {
		frmSLIK.mask('Please wait...');
	}

	function fnMaskHide() {
		frmSLIK.unmask();
	}
	
	frmSLIK.render(Ext.getBody());
	Ext.get('loading').destroy();

});