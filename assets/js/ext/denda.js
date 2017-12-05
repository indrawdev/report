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

	Ext.define('DataGridDenda', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fd_tgljtp', type: 'string'},
			{name: 'fs_nampem', type: 'string'},
			{name: 'fn_anggih', type: 'string'}
		]
	});

	// STORES
	var grupCabang = Ext.create('Ext.data.Store', {
		autoLoad: false,
		fields: [
			'fs_kode_cabang','fs_nama_cabang'
		],
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
			url: 'fpd/gridcabang'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCariCabang').getValue()
				});
			}
		}
	});

	var grupDenda = Ext.create('Ext.data.Store', {
		autoLoad: false,
		model: 'DataGridDenda',
		sorters: [{
	        property: '',
	        direction: 'DESC'
   		}],
   		sortRoot: '',
   		sortOnLoad: true,
   		remoteSort: false,
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				type: 'json',
			},
			type: 'ajax',
			url: 'fpd/gridgroupdealer',
			timeout: 360000
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_kode_cabang': Ext.getCmp('txtKdCabang').getValue(),
					'fd_start': Ext.Date.format(Ext.getCmp('cboStartDate').getValue(), 'Y-m-d'),
					'fd_end': Ext.Date.format(Ext.getCmp('cboEndDate').getValue(), 'Y-m-d')
				});
			}
		}
	});

	// WIN POPUP
	var winGrid = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		autoDestroy: true,
		height: 450,
		width: 500,
		sortableColumns: false,
		store: grupCabang,
		columns: [{
			xtype: 'rownumberer',
			width: 25
		},{
			text: 'Kode Cabang',
			dataIndex: 'fs_kode_cabang',
			menuDisabled: true,
			flex: 0.7
		},{
			text: 'Nama Cabang',
			dataIndex: 'fs_nama_cabang',
			menuDisabled: true,
			flex: 2
		}],
		tbar: [{
			flex: 1,
			layout: 'anchor',
			xtype: 'container',
			items: [{
				anchor: '98%',
				emptyText: 'Nama Cabang',
				id: 'txtCariCabang',
				name: 'txtCariCabang',
				xtype: 'textfield'
			}]
		},{
			flex: 0.2,
			layout: 'anchor',
			xtype: 'container',
			items: [{
				anchor: '100%',
				text: 'Search',
				xtype: 'button',
				handler: function() {
					grupCabang.load();
				}
			}]
		},{
			flex: 0.5,
			layout: 'anchor',
			xtype: 'container',
			items: []
		}],
		bbar: Ext.create('Ext.PagingToolbar', {
			displayInfo: true,
			pageSize: 25,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			store: grupCabang,
			items:[
				'-', {
				text: 'Exit',
				handler: function() {
					winCari.hide();
				}
			}]
		}),
		listeners: {
			itemdblclick: function(grid, record) {
				Ext.getCmp('cboCabang').setValue(record.get('fs_nama_cabang'));
				Ext.getCmp('txtKdCabang').setValue(record.get('fs_kode_cabang'));
				winCari.hide();
			}
		},
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var winCari = Ext.create('Ext.window.Window', {
		border: false,
		closable: false,
		draggable: true,
		frame: false,
		layout: 'fit',
		plain: true,
		resizable: false,
		title: 'Searching...',
		items: [
			winGrid
		],
		listeners: {
			beforehide: function() {
				vMask.hide();
			},
			beforeshow: function() {
				grupCabang.load();
				vMask.show();
			}
		}
	});

	// COMPONENTS
	var cboCabang = {
		afterLabelTextTpl: required,
		allowBlank: false,
		anchor: '99%',
		emptyText: 'Nama Cabang',
		fieldLabel: 'Nama Cabang',
		editable: false,
		id: 'cboCabang',
		name: 'cboCabang',
		xtype: 'textfield',
		triggers: {
			reset: {
				cls: 'x-form-clear-trigger',
				handler: function(field) {
					field.setValue('');
					Ext.getCmp('txtKdCabang').setValue('');
				}
			},
			cari: {
				cls: 'x-form-search-trigger',
				handler: function() {
					winCari.show();
					winCari.center();
				}
			}
		}
	};

	var txtKdCabang = {
		id: 'txtKdCabang',
		name: 'txtKdCabang',
		xtype: 'textfield',
		hidden: true
	};

	var cboStartDate = {
		afterLabelTextTpl: required,
		allowBlank: false,
		anchor: '99%',
		editable: true,
		fieldLabel: 'Mulai',
		labelWidth: 85,
		format: 'd-m-Y',
		id: 'cboStartDate',
		maskRe: /[0-9-]/,
		minValue: Ext.Date.add(new Date(), Ext.Date.YEAR, -50),
		name: 'cboStartDate',
		value: new Date(),
		xtype: 'datefield'
	};

	var cboEndDate = {
		afterLabelTextTpl: required,
		allowBlank: false,
		anchor: '99%',
		editable: true,
		fieldLabel: 'Selesai',
		labelWidth: 85,
		format: 'd-m-Y',
		id: 'cboEndDate',
		maskRe: /[0-9-]/,
		minValue: Ext.Date.add(new Date(), Ext.Date.YEAR, -50),
		name: 'cboEndDate',
		value: new Date(),
		xtype: 'datefield'
	};

	var btnShow = {
		anchor: '100%',
		id: 'btnShow',
		name: 'btnShow',
		scale: 'medium',
		iconCls: 'icon-complete',
		text: 'TAMPILKAN DATA',
		xtype: 'button',
		handler: function() {
			if (this.up('form').getForm().isValid()) {
				grupDenda.removeAll();
				grupDenda.load();
			}
		}
	};

	// GRIDS
	var gridDenda = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		autoDestroy: true,
		height: 250,
		sortableColumns: false,
		store: grupDenda,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			align: 'center',
			text: 'JATUH TEMPO',
			dataIndex: 'fd_tgljtp',
			menuDisabled: true,
			width: 80,
			locked: true
		},{
			align: 'center',
			text: 'KONSUMEN',
			dataIndex: 'fs_nampem',
			menuDisabled: true,
			width: 185,
			locked: true
		},{
			align: 'center',
			text: 'ANGS. KE',
			dataIndex: 'fs_nampem',
			menuDisabled: true,
			width: 60
		},{
			align: 'center',
			text: 'TENOR',
			dataIndex: 'fs_nampem',
			menuDisabled: true,
			width: 50
		},{
			align: 'center',
			text: 'OVD',
			dataIndex: 'fs_nampem',
			menuDisabled: true,
			width: 50
		},{
			align: 'right',
			text: 'OS POKOK',
			dataIndex: 'fs_nampem',
			menuDisabled: true,
			width: 100
		},{
			align: 'right',
			text: 'ANGS. TERTUNGGAK',
			dataIndex: 'fs_nampem',
			menuDisabled: true,
			width: 110
		},{
			align: 'right',
			text: 'DENDA. TERTUNGGAK',
			dataIndex: 'fs_nampem',
			menuDisabled: true,
			width: 120
		},{
			align: 'right',
			text: 'ANGS. JATUH TEMPO',
			dataIndex: 'fs_nampem',
			menuDisabled: true,
			width: 120
		},{
			align: 'right',
			text: 'TOTAL',
			dataIndex: 'fs_nampem',
			menuDisabled: true,
			width: 110
		},{
			align: 'right',
			text: 'REALISASI',
			dataIndex: 'fs_nampem',
			menuDisabled: true,
			width: 110
		}],
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	// FUNCTIONS
	function fnReset() {

	}

	function fnPrint() {
		var xkdcabang = Ext.getCmp('txtKdCabang').getValue();
		var xtglstart =  Ext.Date.format(Ext.getCmp('cboStartDate').getValue(), 'Y-m-d');
		var xtglend = Ext.Date.format(Ext.getCmp('cboEndDate').getValue(), 'Y-m-d');

		if (xkdcabang == '') {
			xkdcabang = 0;
		}

		var popUp = Ext.create('Ext.window.Window', {
			modal: true,
			width: 950,
			height: 650,
			layout:'anchor',
			title: 'REPORT',
			buttons: [{
				text: 'Close',
				handler: function() {
					vMask.hide();
					popUp.hide();
				}
			}]
		});

		popUp.add({html: '<iframe width="942" height="650" src="denda/preview/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend +'"></iframe>'});
		popUp.show();
	}

	var frmDenda = Ext.create('Ext.form.Panel', {
		border: false,
		frame: true,
		region: 'center',
		title: 'Denda',
		width: 930,
		items: [{
			bodyStyle: 'background-color: '.concat(gBasePanel),
			border: false,
			frame: false,
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
				title: 'Report Denda',
				xtype: 'fieldset',
				items: [{
					anchor: '100%',
					layout: 'hbox',
					xtype: 'container',
					items: [{
						flex: 2,
						layout: 'anchor',
						xtype: 'container',
						style: 'padding: 5px;',
						items: [{
							style: 'padding: 5px;',
							xtype: 'fieldset',
							items: [
								cboCabang,
								txtKdCabang
							]
						},{
							style: 'padding: 5px;',
							xtype: 'fieldset',
							items: [
								btnShow
							]
						}]
					},{
						flex: 2,
						layout: 'anchor',
						xtype: 'container',
						style: 'padding: 5px;',
						items: [{
							style: 'padding: 5px;',
							xtype: 'fieldset',
							items: [
								cboStartDate,
								cboEndDate
							]
						}]
					}]
				},{
					anchor: '100%',
					style: 'padding: 5px',
					title: 'Data Denda',
					xtype: 'fieldset',
					items: [
						gridDenda
					]
				}]
			}],
			buttons: [{
				text: 'Print PDF',
				iconCls: 'icon-print',
				scale: 'medium',
				handler: fnPrint
			},{
				text: 'Reset',
				iconCls: 'icon-reset',
				scale: 'medium',
				handler: fnReset
			}]
		}]
	});

	var vMask = new Ext.LoadMask({
		msg: 'Please wait...',
		target: frmDenda
	});

	function fnMaskShow() {
		frmDenda.mask('Please wait...');
	}

	function fnMaskHide() {
		frmDenda.unmask();
	}
	
	frmDenda.render(Ext.getBody());
	Ext.get('loading').destroy();

});