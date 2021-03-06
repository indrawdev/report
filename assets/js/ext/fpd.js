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

	Ext.define('DataGridGroupDealer', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fn_koddel', type: 'string'},
			{name: 'fs_namdel', type: 'string'},
			{name: 'fs_ptgsvy', type: 'string'},
			{name: 'fn_current', type: 'string'},
			{name: 'fn_1_7', type: 'string'},
			{name: 'fn_8_15', type: 'string'},
			{name: 'fn_16_30', type: 'string'},
			{name: 'fn_31_60', type: 'string'},
			{name: 'fn_61_90', type: 'string'},
			{name: 'fn_91_120', type: 'string'},
			{name: 'fn_max', type: 'string'},
			{name: 'fn_total', type: 'string'},
			{name: 'fn_ovd', type: 'string'}
		]
	});

	Ext.define('DataGridGroupSurveyor', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fn_koddel', type: 'string'},
			{name: 'fs_namdel', type: 'string'},
			{name: 'fs_ptgsvy', type: 'string'},
			{name: 'fn_current', type: 'string'},
			{name: 'fn_1_7', type: 'string'},
			{name: 'fn_8_15', type: 'string'},
			{name: 'fn_16_30', type: 'string'},
			{name: 'fn_31_60', type: 'string'},
			{name: 'fn_61_90', type: 'string'},
			{name: 'fn_91_120', type: 'string'},
			{name: 'fn_max', type: 'string'},
			{name: 'fn_total', type: 'string'},
			{name: 'fn_ovd', type: 'string'}
		]
	});

	var grupGroupingDealer = Ext.create('Ext.data.Store', {
		autoLoad: false,
		model: 'DataGridGroupDealer',
		sorters: [{
	        property: 'fn_ovd',
	        direction: 'DESC'
   		}],
   		sortRoot: 'fn_ovd',
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
					'fs_kode_cabang': Ext.getCmp('txtKdCabang1').getValue(),
					'fd_start': Ext.Date.format(Ext.getCmp('cboStartDate1').getValue(), 'Y-m-d'),
					'fd_end': Ext.Date.format(Ext.getCmp('cboEndDate1').getValue(), 'Y-m-d')
				});
			}
		}
	});

	var grupGroupingSurveyor = Ext.create('Ext.data.Store', {
		autoLoad: false,
		model: 'DataGridGroupDealer',
		sorters: [{
	        property: 'fn_ovd',
	        direction: 'DESC'
   		}],
   		sortRoot: 'fn_ovd',
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
			url: 'fpd/gridgroupsurveyor',
			timeout: 360000
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_kode_cabang': Ext.getCmp('txtKdCabang2').getValue(),
					'fd_start': Ext.Date.format(Ext.getCmp('cboStartDate2').getValue(), 'Y-m-d'),
					'fd_end': Ext.Date.format(Ext.getCmp('cboEndDate2').getValue(), 'Y-m-d')
				});
			}
		}
	});

	var gridGroupingDealer = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 250,
		sortableColumns: false,
		store: grupGroupingDealer,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			text: 'DETAIL',
			align: 'center',
			width: 70,
			renderer:function(data, cell, record, rowIndex, columnIndex, store) {
				var id = Ext.id();
				Ext.defer(function() {
					Ext.widget('button', {
						renderTo: id,
						text: 'DETAIL',
						scale: 'small',
						handler: function() {
							var record = gridGroupingDealer.getStore().getAt(rowIndex);

							var xkdcabang = record.get('fn_kodekr');
							var xtglstart = record.get('fd_start');
							var xtglend = record.get('fd_end');
							var xkddealer = record.get('fn_koddel');

							// AFTER CLICK OPEN WINDOW
							var popUp = Ext.create('Ext.window.Window', {
								modal: true,
								width: 950,
								height: 650,
								closable: false,
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

							popUp.add({html: '<iframe width="942" height="650" src="fpd/previewdealerdetail/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend +'/'+ xkddealer +'"></iframe>'});
							popUp.show();
						}
					});
				}, 50);
				return Ext.String.format('<div id="{0}"></div>', id);
			}
		},{
			text: 'EXPORT TO EXCEL',
			align: 'center',
			width: 100,
			renderer:function(data, cell, record, rowIndex, columnIndex, store) {
				var id = Ext.id();
				Ext.defer(function() {
					Ext.widget('button', {
						renderTo: id,
						text: 'Export To Excel',
						scale: 'small',
						handler: function() {
							var record = gridGroupingDealer.getStore().getAt(rowIndex);

							var xkdcabang = record.get('fn_kodekr');
							var xtglstart = record.get('fd_start');
							var xtglend = record.get('fd_end');
							var xkddealer = record.get('fn_koddel');

							// AFTER CLICK OPEN WINDOW
							var popUp = Ext.create('Ext.window.Window', {
								width: 300,
								closable: false,
								draggable: false,
								layout: 'fit',
								title: 'MFAS',
								items: [],
								buttons: [{
									xtype: 'button',
									text: 'Download',
									href: 'fpd/downloaddealerdetail/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend +'/'+ xkddealer,
									hrefTarget: '_blank',
									handler: function() {
										vMask.hide();
										popUp.hide();
									}
								},{
									text: 'Exit',
									handler: function() {
										vMask.hide();
										popUp.hide();
									}
								}]
							}).show();
						}
					});
				}, 50);
				return Ext.String.format('<div id="{0}"></div>', id);
			}
		},{
			align: 'center',
			text: 'KODE',
			dataIndex: 'fn_koddel',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: 'NAMA DEALER',
			dataIndex: 'fs_namdel',
			menuDisabled: true,
			width: 195
		},{
			align: 'center',
			text: 'CURRENT',
			dataIndex: 'fn_current',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '1-7 Hari',
			dataIndex: 'fn_1_7',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '8-15 Hari',
			dataIndex: 'fn_8_15',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '16-30 Hari',
			dataIndex: 'fn_16_30',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '31-60 Hari',
			dataIndex: 'fn_31_60',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '61-90 Hari',
			dataIndex: 'fn_61_90',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '91-120 Hari',
			dataIndex: 'fn_91_120',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '> 120 Hari',
			dataIndex: 'fn_max',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: 'TOTAL',
			dataIndex: 'fn_total',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: 'OVD %',
			dataIndex: 'fn_ovd',
			menuDisabled: true,
			width: 70
		},{
			dataIndex: 'fn_kodekr',
			menuDisabled: true,
			hidden:true
		},{
			dataIndex: 'fd_start',
			menuDisabled: true,
			hidden:true
		},{
			dataIndex: 'fd_end',
			menuDisabled: true,
			hidden:true
		}],
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var gridGroupingSurveyor = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		autoDestroy: true,
		height: 250,
		sortableColumns: false,
		store: grupGroupingSurveyor,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			align: 'center',
			text: 'DETAIL',
			width: 70,
			renderer:function(data, cell, record, rowIndex, columnIndex, store) {
				var id = Ext.id();
				Ext.defer(function() {
					Ext.widget('button', {
						renderTo: id,
						text: 'DETAIL',
						scale: 'small',
						handler: function() {
							var record = gridGroupingSurveyor.getStore().getAt(rowIndex);

							var xkdcabang = record.get('fn_kodekr');
							var xtglstart = record.get('fd_start');
							var xtglend = record.get('fd_end');
							var xptgsvy = record.get('fs_ptgsvy');

							var popUp = Ext.create('Ext.window.Window', {
								modal: true,
								width: 950,
								height: 650,
								closable: false,
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

							popUp.add({html: '<iframe width="942" height="650" src="fpd/previewsurveyordetail/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend +'/'+ xptgsvy +'"></iframe>'});
							popUp.show();
						}
					});
				}, 50);
				return Ext.String.format('<div id="{0}"></div>', id);
			}
		},{
			align: 'center',
			text: 'EXPORT TO EXCEL',
			width: 100,
			renderer:function(data, cell, record, rowIndex, columnIndex, store) {
				var id = Ext.id();
				Ext.defer(function() {
					Ext.widget('button', {
						renderTo: id,
						text: 'Export To Excel',
						scale: 'small',
						handler: function() {
							var record = gridGroupingSurveyor.getStore().getAt(rowIndex);

							var xkdcabang = record.get('fn_kodekr');
							var xtglstart = record.get('fd_start');
							var xtglend = record.get('fd_end');
							var xptgsvy = record.get('fs_ptgsvy');

							var popUp = Ext.create('Ext.window.Window', {
								width: 300,
								closable: false,
								draggable: false,
								layout: 'fit',
								title: 'REPORT',
								items: [],
								buttons: [{
									xtype: 'button',
									text: 'Download',
									href: 'fpd/downloadsurveyordetail/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend +'/'+ xptgsvy,
									hrefTarget: '_blank',
									handler: function() {
										vMask.hide();
										popUp.hide();
									}
								},{
									text: 'Exit',
									handler: function() {
										vMask.hide();
										popUp.hide();
									}
								}]
							}).show();
						}
					});
				}, 50);
				return Ext.String.format('<div id="{0}"></div>', id);
			}
		},{
			align: 'center',
			text: 'CMO',
			dataIndex: 'fs_ptgsvy',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: 'NAMA SURVEYOR',
			dataIndex: 'fs_nama_surveyor',
			menuDisabled: true,
			width: 185
		},{
			align: 'center',
			text: 'CURRENT',
			dataIndex: 'fn_current',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '1-7 Hari',
			dataIndex: 'fn_1_7',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '8-15 Hari',
			dataIndex: 'fn_8_15',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '16 -30 Hari',
			dataIndex: 'fn_16_30',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '31-60 Hari',
			dataIndex: 'fn_31_60',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '61-90 Hari',
			dataIndex: 'fn_61_90',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '91-120 Hari',
			dataIndex: 'fn_91_120',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: '> 120 Hari',
			dataIndex: 'fn_max',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: 'TOTAL',
			dataIndex: 'fn_total',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: 'OVD %',
			dataIndex: 'fn_ovd',
			menuDisabled: true,
			width: 70
		},{
			dataIndex: 'fn_kodekr',
			menuDisabled: true,
			hidden: true
		},{
			dataIndex: 'fd_start',
			menuDisabled: true,
			hidden: true
		},{
			dataIndex: 'fd_end',
			menuDisabled: true,
			hidden: true
		}],
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var grupCabang1 = Ext.create('Ext.data.Store', {
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
					'fs_cari': Ext.getCmp('txtCariCabang1').getValue()
				});
			}
		}
	});

	var grupCabang2 = Ext.create('Ext.data.Store', {
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
					'fs_cari': Ext.getCmp('txtCariCabang2').getValue()
				});
			}
		}
	});


	// POPUP CABANG REPOT DEALER
	var winGrid1 = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		autoDestroy: true,
		height: 450,
		width: 500,
		sortableColumns: false,
		store: grupCabang1,
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
				id: 'txtCariCabang1',
				name: 'txtCariCabang1',
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
					grupCabang1.load();
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
			store: grupCabang1,
			items:[
				'-', {
				text: 'Exit',
				handler: function() {
					winCari1.hide();
				}
			}]
		}),
		listeners: {
			itemdblclick: function(grid, record) {
				Ext.getCmp('cboCabang1').setValue(record.get('fs_nama_cabang'));
				Ext.getCmp('txtKdCabang1').setValue(record.get('fs_kode_cabang'));
				winCari1.hide();
			}
		},
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var winCari1 = Ext.create('Ext.window.Window', {
		border: false,
		closable: false,
		draggable: true,
		frame: false,
		layout: 'fit',
		plain: true,
		resizable: false,
		title: 'Searching...',
		items: [
			winGrid1
		],
		listeners: {
			beforehide: function() {
				vMask.hide();
			},
			beforeshow: function() {
				grupCabang1.load();
				vMask.show();
			}
		}
	});

	// POPUP CABANG REPORT SURVEYOR
	var winGrid2 = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		autoDestroy: true,
		height: 450,
		width: 500,
		sortableColumns: false,
		store: grupCabang2,
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
				id: 'txtCariCabang2',
				name: 'txtCariCabang2',
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
					grupCabang2.load();
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
			store: grupCabang2,
			items:[
				'-', {
				text: 'Exit',
				handler: function() {
					winCari2.hide();
				}
			}]
		}),
		listeners: {
			itemdblclick: function(grid, record) {
				Ext.getCmp('cboCabang2').setValue(record.get('fs_nama_cabang'));
				Ext.getCmp('txtKdCabang2').setValue(record.get('fs_kode_cabang'));
				winCari2.hide();
			}
		},
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

	var winCari2 = Ext.create('Ext.window.Window', {
		border: false,
		closable: false,
		draggable: true,
		frame: false,
		layout: 'fit',
		plain: true,
		resizable: false,
		title: 'Searching...',
		items: [
			winGrid2
		],
		listeners: {
			beforehide: function() {
				vMask.hide();
			},
			beforeshow: function() {
				grupCabang2.load();
				vMask.show();
			}
		}
	});

	// COMPONENT TAB FORM REPORT DEALER
	var cboCabang1 = {
		afterLabelTextTpl: required,
		allowBlank: false,
		anchor: '99%',
		emptyText: 'Nama Cabang',
		fieldLabel: 'Nama Cabang',
		editable: false,
		id: 'cboCabang1',
		name: 'cboCabang1',
		xtype: 'textfield',
		triggers: {
			reset: {
				cls: 'x-form-clear-trigger',
				handler: function(field) {
					field.setValue('');
					Ext.getCmp('txtKdCabang1').setValue('');
				}
			},
			cari: {
				cls: 'x-form-search-trigger',
				handler: function() {
					winCari1.show();
					winCari1.center();
				}
			}
		}
	};

	var txtKdCabang1 = {
		id: 'txtKdCabang1',
		name: 'txtKdCabang1',
		xtype: 'textfield',
		hidden: true
	};

	var cboStartDate1 = {
		afterLabelTextTpl: required,
		allowBlank: false,
		anchor: '99%',
		editable: true,
		fieldLabel: 'Mulai',
		labelWidth: 85,
		format: 'd-m-Y',
		id: 'cboStartDate1',
		maskRe: /[0-9-]/,
		minValue: Ext.Date.add(new Date(), Ext.Date.YEAR, -50),
		name: 'cboStartDate1',
		value: new Date(),
		xtype: 'datefield'
	};

	var cboEndDate1 = {
		afterLabelTextTpl: required,
		allowBlank: false,
		anchor: '99%',
		editable: true,
		fieldLabel: 'Selesai',
		labelWidth: 85,
		format: 'd-m-Y',
		id: 'cboEndDate1',
		maskRe: /[0-9-]/,
		minValue: Ext.Date.add(new Date(), Ext.Date.YEAR, -50),
		name: 'cboEndDate1',
		value: new Date(),
		xtype: 'datefield'
	};

	var btnShow1 = {
		anchor: '100%',
		id: 'btnShow1',
		name: 'btnShow1',
		scale: 'medium',
		iconCls: 'icon-complete',
		text: 'TAMPILKAN DATA',
		xtype: 'button',
		handler: function() {
			if (this.up('form').getForm().isValid()) {
				grupGroupingDealer.removeAll();
				grupGroupingDealer.load();
			}
		}
	};

	// COMPONENT TAB FORM REPORT SURVEYOR
	var cboCabang2 = {
		afterLabelTextTpl: required,
		allowBlank: false,
		anchor: '99%',
		emptyText: 'Nama Cabang',
		fieldLabel: 'Nama Cabang',
		editable: false,
		id: 'cboCabang2',
		name: 'cboCabang2',
		xtype: 'textfield',
		triggers: {
			reset: {
				cls: 'x-form-clear-trigger',
				handler: function(field) {
					field.setValue('');
					Ext.getCmp('txtKdCabang2').setValue('');
				}
			},
			cari: {
				cls: 'x-form-search-trigger',
				handler: function() {
					winCari2.show();
					winCari2.center();
				}
			}
		}
	};

	var txtKdCabang2 = {
		id: 'txtKdCabang2',
		name: 'txtKdCabang2',
		xtype: 'textfield',
		hidden: true
	};

	var cboStartDate2 = {
		afterLabelTextTpl: required,
		allowBlank: false,
		anchor: '99%',
		editable: true,
		fieldLabel: 'Mulai',
		labelWidth: 85,
		format: 'd-m-Y',
		id: 'cboStartDate2',
		maskRe: /[0-9-]/,
		minValue: Ext.Date.add(new Date(), Ext.Date.YEAR, -50),
		name: 'cboStartDate2',
		value: new Date(),
		xtype: 'datefield'
	};

	var cboEndDate2 = {
		afterLabelTextTpl: required,
		allowBlank: false,
		anchor: '99%',
		editable: true,
		fieldLabel: 'Selesai',
		labelWidth: 85,
		format: 'd-m-Y',
		id: 'cboEndDate2',
		maskRe: /[0-9-]/,
		minValue: Ext.Date.add(new Date(), Ext.Date.YEAR, -50),
		name: 'cboEndDate2',
		value: new Date(),
		xtype: 'datefield'
	};

	var btnShow2 = {
		anchor: '100%',
		id: 'btnShow2',
		name: 'btnShow2',
		scale: 'medium',
		iconCls: 'icon-complete',
		text: 'TAMPILKAN DATA',
		xtype: 'button',
		handler: function() {
			if (this.up('form').getForm().isValid()) {
				grupGroupingSurveyor.removeAll();
				grupGroupingSurveyor.load();
			}
		}
	};

	// FUNCTIONS
	function fnReset1() {
		Ext.getCmp('cboCabang1').setValue('');
		Ext.getCmp('txtKdCabang1').setValue('');
		Ext.getCmp('cboStartDate1').setValue(new Date());
		Ext.getCmp('cboEndDate1').setValue(new Date());
	}

	function fnReset2() {
		Ext.getCmp('cboCabang2').setValue('');
		Ext.getCmp('txtKdCabang2').setValue('');
		Ext.getCmp('cboStartDate2').setValue(new Date());
		Ext.getCmp('cboEndDate2').setValue(new Date());
	}

	function fnPrintDealer() {
		var xkdcabang = Ext.getCmp('txtKdCabang1').getValue();
		var xtglstart =  Ext.Date.format(Ext.getCmp('cboStartDate1').getValue(), 'Y-m-d');
		var xtglend = Ext.Date.format(Ext.getCmp('cboEndDate1').getValue(), 'Y-m-d');

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

		popUp.add({html: '<iframe width="942" height="650" src="fpd/previewpdfdealerall/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend +'"></iframe>'});
		popUp.show();
	}

	function fnDownloadDealer() {
		var xkdcabang = Ext.getCmp('txtKdCabang1').getValue();
		var xtglstart =  Ext.Date.format(Ext.getCmp('cboStartDate1').getValue(), 'Y-m-d');
		var xtglend = Ext.Date.format(Ext.getCmp('cboEndDate1').getValue(), 'Y-m-d');

		if (xkdcabang == '') {
			xkdcabang = 0;
		}

		var popUp = Ext.create('Ext.window.Window', {
			width: 300,
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'REPORT',
			items: [],
			buttons: [{
				xtype: 'button',
				text: 'Download',
				href: 'fpd/downloadexceldealerall/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend,
				hrefTarget: '_blank',
				handler: function() {
					vMask.hide();
					popUp.hide();
				}
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					popUp.hide();
				}
			}]
		}).show();
	}

	function fnPrintSurveyor() {
		var xkdcabang = Ext.getCmp('txtKdCabang2').getValue();
		var xtglstart =  Ext.Date.format(Ext.getCmp('cboStartDate2').getValue(), 'Y-m-d');
		var xtglend = Ext.Date.format(Ext.getCmp('cboEndDate2').getValue(), 'Y-m-d');

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

		popUp.add({html: '<iframe width="942" height="650" src="fpd/previewpdfsurveyorall/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend +'"></iframe>'});
		popUp.show();
	}

	function fnDownloadSurveyor() {
		var xkdcabang = Ext.getCmp('txtKdCabang2').getValue();
		var xtglstart =  Ext.Date.format(Ext.getCmp('cboStartDate2').getValue(), 'Y-m-d');
		var xtglend = Ext.Date.format(Ext.getCmp('cboEndDate2').getValue(), 'Y-m-d');

		if (xkdcabang == '') {
			xkdcabang = 0;
		}

		var popUp = Ext.create('Ext.window.Window', {
			width: 300,
			closable: false,
			draggable: false,
			layout: 'fit',
			title: 'REPORT',
			items: [],
			buttons: [{
				xtype: 'button',
				text: 'Download',
				href: 'fpd/downloadexcelsurveyorall/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend,
				hrefTarget: '_blank',
				handler: function() {
					vMask.hide();
					popUp.hide();
				}
			},{
				text: 'Exit',
				handler: function() {
					vMask.hide();
					popUp.hide();
				}
			}]
		}).show();
	}

	var frmFDP = Ext.create('Ext.form.Panel', {
		border: false,
		frame: true,
		region: 'center',
		title: 'First Payment Default',
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
				title: 'Report Dealer',
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
					title: 'Report Dealer',
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
									cboCabang1,
									txtKdCabang1
								]
							},{
								style: 'padding: 5px;',
								xtype: 'fieldset',
								items: [
									btnShow1
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
									cboStartDate1,
									cboEndDate1
								]
							}]
						}]
					}]
				},{
					anchor: '100%',
					style: 'padding: 5px',
					title: 'Data Dealer',
					xtype: 'fieldset',
					items: [
						gridGroupingDealer
					]
				}],
				buttons: [{
					text: 'Print PDF',
					iconCls: 'icon-print',
					scale: 'medium',
					handler: fnPrintDealer
				},{
					text: 'Download Excel',
					iconCls: 'icon-save',
					scale: 'medium',
					handler: fnDownloadDealer
				}]
			},{
				id: 'tab2',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Report Surveyor',
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
					title: 'Report Surveyor',
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
									cboCabang2,
									txtKdCabang2
								]
							},{
								style: 'padding: 5px;',
								xtype: 'fieldset',
								items: [
									btnShow2
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
									cboStartDate2,
									cboEndDate2
								]
							}]
						}]
					}]
				},{
					anchor: '100%',
					style: 'padding: 5px',
					title: 'Data Dealer',
					xtype: 'fieldset',
					items: [
						gridGroupingSurveyor
					]
				}],
				buttons: [{
					text: 'Print PDF',
					iconCls: 'icon-print',
					scale: 'medium',
					handler: fnPrintSurveyor
				},{
					text: 'Download Excel',
					iconCls: 'icon-save',
					scale: 'medium',
					handler: fnDownloadSurveyor
				}]
			}]
		}]
	});

	var vMask = new Ext.LoadMask({
		msg: 'Please wait...',
		target: frmFDP
	});

	function fnMaskShow() {
		frmFDP.mask('Please wait...');
	}

	function fnMaskHide() {
		frmFDP.unmask();
	}
	
	frmFDP.render(Ext.getBody());
	Ext.get('loading').destroy();
});