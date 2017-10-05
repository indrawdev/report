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

	Ext.define('DataGridGrouping', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fs_kode_cabang', type: 'string'},
			{name: 'fd_start', type: 'string'},
			{name: 'fd_end', type: 'string'},
			{name: 'fs_kategori', type: 'string'},
			{name: 'fn_unit', type: 'string'},
			{name: 'fn_ospokok', type: 'string'}
		]
	});

	var grupGrouping = Ext.create('Ext.data.Store', {
		autoLoad: false,
		model: 'DataGridGrouping',
		proxy: {
			actionMethods: {
				read: 'POST'
			},
			reader: {
				rootProperty: 'hasil',
				totalProperty: 'total',
				type: 'json',
			},
			type: 'ajax',
			url: 'aging/gridgrouping',
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

	var gridGrouping = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		height: 270,
		sortableColumns: false,
		store: grupGrouping,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			align: 'center',
			text: 'DETAIL',
			width: 90,
			renderer:function(data, cell, record, rowIndex, columnIndex, store) {
				var id = Ext.id();
				Ext.defer(function() {
					Ext.widget('button', {
						renderTo: id,
						text: 'Detail',
						scale: 'small',
						handler: function() {
							var record = gridGrouping.getStore().getAt(rowIndex);

							var xkdcabang = record.get('fs_kode_cabang');
							var xtglstart = record.get('fd_start');
							var xtglend = record.get('fd_end');
							var xkategori = record.get('fs_kategori');

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

							popUp.add({html: '<iframe height="650" width="942" src="aging/previewagingdetail/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend +'/'+ xkategori + '"></iframe>'});
							popUp.show();
						}
					});
				}, 50);
				return Ext.String.format('<div id="{0}"></div>', id);
			}
		},{
			align: 'center',
			text: 'EXPORT TO EXCEL',
			width: 120,
			renderer:function(data, cell, record, rowIndex, columnIndex, store) {
				var id = Ext.id();
				Ext.defer(function() {
					Ext.widget('button', {
						renderTo: id,
						text: 'Export Excel',
						scale: 'small',
						handler: function() {
							var record = gridGrouping.getStore().getAt(rowIndex);

							var xkdcabang = record.get('fs_kode_cabang');
							var xtglstart = record.get('fd_start');
							var xtglend = record.get('fd_end');
							var xkategori = record.get('fs_kategori');

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
									href: 'aging/downloadagingdetail/' + xkdcabang + '/' + xtglstart + '/' + xtglend + '/' + xkategori,
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
			text: 'KATEGORI AGING',
			dataIndex: 'fs_kategori',
			width: 260,
			menuDisabled: true
		},{
			align: 'center',
			text: 'Unit',
			dataIndex: 'fn_unit',
			menuDisabled: true,
			width: 70
		},{
			align: 'center',
			text: 'O/S POKOK',
			dataIndex: 'fn_ospokok',
			menuDisabled: true,
			width: 145
		}],
		viewConfig: {
			getRowClass: function() {
				return 'rowwrap';
			},
			markDirty: false
		}
	});

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
			url: 'aging/gridcabang'
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_cari': Ext.getCmp('txtCariCabang').getValue()
				});
			}
		}
	});

	// POPUP CABANG
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

	// COMPONENT FORM AGING SURVEYOR
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
		handler: fnShowData
	};

	// FUNCTIONS
	function fnShowData() {
		if (this.up('form').getForm().isValid()) {
			grupGrouping.removeAll();
			grupGrouping.load();
		}
	}

	function fnReset() {
		Ext.getCmp('cboCabang').setValue('');
		Ext.getCmp('txtKdCabang').setValue('');
		Ext.getCmp('cboStartDate').setValue(new Date());
		Ext.getCmp('cboEndDate').setValue(new Date());
	}

	function fnPreview() {
		if (this.up('form').getForm().isValid()) {
			var xkdcabang = Ext.getCmp('txtKdCabang').getValue();
			var xtglstart = Ext.Date.format(Ext.getCmp('cboStartDate').getValue(), 'Y-m-d');
			var xtglend = Ext.Date.format(Ext.getCmp('cboEndDate').getValue(), 'Y-m-d');

			if (xkdcabang == '') {
				xkdcabang = 0;
			}

			var popUp = Ext.create('Ext.window.Window', {
				modal: true,
				closable: false,
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

			popUp.add({html: '<iframe height="650" width="942" src="aging/previewpdfagingall/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend +'"></iframe>'});
			popUp.show();
		}
	}

	function fnDownload() {
		if (this.up('form').getForm().isValid()) {
			var xkdcabang = Ext.getCmp('txtKdCabang').getValue();
			var xtglstart = Ext.Date.format(Ext.getCmp('cboStartDate').getValue(), 'Y-m-d');
			var xtglend = Ext.Date.format(Ext.getCmp('cboEndDate').getValue(), 'Y-m-d');

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
					href: 'aging/downloadexcelagingall/'+ xkdcabang +'/'+ xtglstart +'/'+ xtglend,
					hrefTarget: '_blank',
					handler: function() {
						vMask.hide();
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
	}

	var frmAging = Ext.create('Ext.form.Panel', {
		border: false,
		frame: true,
		region: 'center',
		title: 'Aging Surveyor',
		width: 930,
		items: [{
			fieldDefaults: {
				labelAlign: 'right',
				labelSeparator: '',
				labelWidth: 90,
				msgTarget: 'side'
			},
			anchor: '100%',
			style: 'padding: 5px;',
			title: 'Report Aging Surveyor',
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
				layout: 'hbox',
				xtype: 'container',
				items: [{
					flex: 4,
					layout: 'anchor',
					xtype: 'container',
					style: 'padding: 5px;',
					items: [{
						style: 'padding: 5px;',
						xtype: 'fieldset',
						items: [
							gridGrouping
						]
					}]
				}]
			}]
		}],
		buttons: [{
				text: 'Print PDF',
				iconCls: 'icon-print',
				scale: 'medium',
				handler: fnPreview
			},{
				text: 'Download Excel',
				iconCls: 'icon-save',
				scale: 'medium',
				handler: fnDownload
			}]
	});

	var vMask = new Ext.LoadMask({
		msg: 'Please wait...',
		target: frmAging
	});

	function fnMaskShow() {
		frmAging.mask('Please wait...');
	}

	function fnMaskHide() {
		frmAging.unmask();
	}
	
	frmAging.render(Ext.getBody());
	Ext.get('loading').destroy();
});