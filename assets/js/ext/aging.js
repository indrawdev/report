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


	var gridAging = {};

	// FUNCTIONS
	function fnShowData() {

	}

	function fnPreview() {

	}

	function fnDownload() {

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
			title: 'Report',
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
			}]
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