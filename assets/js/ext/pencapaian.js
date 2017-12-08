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

	Ext.define('DataGridPencapaian', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'fd_tgljtp', type: 'string'},
			{name: 'fs_nampem', type: 'string'},
			{name: 'fn_anggih', type: 'string'}
		]
	});

	Ext.define('Ext.form.field.Month', {
        extend: 'Ext.form.field.Date',
        alias: 'widget.monthfield',
        requires: ['Ext.picker.Month'],
        alternateClassName: ['Ext.form.MonthField', 'Ext.form.Month'],
        selectMonth: null,
        createPicker: function () {
		    var me = this,
		        format = Ext.String.format,
		        pickerConfig;

		    pickerConfig = {
		        pickerField: me,
		        ownerCmp: me,
		        renderTo: document.body,
		        floating: true,
		        hidden: true,
		        focusOnShow: true,
		        minDate: me.minValue,
		        maxDate: me.maxValue,
		        disabledDatesRE: me.disabledDatesRE,
		        disabledDatesText: me.disabledDatesText,
		        disabledDays: me.disabledDays,
		        disabledDaysText: me.disabledDaysText,
		        format: me.format,
		        showToday: me.showToday,
		        startDay: me.startDay,
		        minText: format(me.minText, me.formatDate(me.minValue)),
		        maxText: format(me.maxText, me.formatDate(me.maxValue)),
		        listeners: {
		            select: { scope: me, fn: me.onSelect },
		            monthdblclick: { scope: me, fn: me.onOKClick },
		            yeardblclick: { scope: me, fn: me.onOKClick },
		            OkClick: { scope: me, fn: me.onOKClick },
		            CancelClick: { scope: me, fn: me.onCancelClick }
		        },
		        keyNavConfig: {
		            esc: function () {
		                me.collapse();
		            }
		        }
		    };

		    if (Ext.isChrome) {
		        me.originalCollapse = me.collapse;
		        pickerConfig.listeners.boxready = {
		            fn: function () {
		                this.picker.el.on({
		                    mousedown: function () {
		                        this.collapse = Ext.emptyFn;
		                    },
		                    mouseup: function () {
		                        this.collapse = this.originalCollapse;
		                    },
		                    scope: this
		                });
		            },
		            scope: me,
		            single: true
		        }
		    }

		    return Ext.create('Ext.picker.Month', pickerConfig);
		},
        onCancelClick: function() {
            var me = this;
            me.selectMonth = null;
            me.collapse();
        },
        onOKClick: function() {
            var me = this;
            if (me.selectMonth) {
                me.setValue(me.selectMonth);
                me.fireEvent('select', me, me.selectMonth);
            }
            me.collapse();
        },
        onSelect: function(m, d) {
            var me = this;
            me.selectMonth = new Date((d[0] + 1) + '/1/' + d[1]);
        }
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

	var grupPencapaian = Ext.create('Ext.data.Store', {
		autoLoad: false,
		model: 'DataGridPencapaian',
		sorters: [{
	        property: 'fd_tgljtp',
	        direction: 'ASC'
   		}],
   		sortRoot: 'fd_tgljtp',
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
			url: 'pencapaian/grid',
			timeout: 360000
		},
		listeners: {
			beforeload: function(store) {
				Ext.apply(store.getProxy().extraParams, {
					'fs_kode_cabang': Ext.getCmp('txtKdCabang').getValue(),
					'fd_periode': Ext.Date.format(Ext.getCmp('cboPeriode').getValue(), 'Y-m-d')
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

	var cboPeriode = {
		anchor: '98%',
		xtype: 'monthfield',
		submitFormat: 'Y-m-d',
		id: 'cboPeriode',
		name: 'cboPeriode',
		format: 'F, Y',
		value: new Date()
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
				grupPencapaian.removeAll();
				grupPencapaian.load();
			}
		}
	};

	// GRIDS
	var gridPencapaian = Ext.create('Ext.grid.Panel', {
		anchor: '100%',
		autoDestroy: true,
		height: 250,
		sortableColumns: false,
		store: grupPencapaian,
		columns: [{
			width: 35,
			xtype: 'rownumberer'
		},{
			align: 'center',
			text: 'JATUH TEMPO',
			dataIndex: 'fd_tgljtp',
			menuDisabled: true,
			width: 80,
			locked: true,
			renderer: Ext.util.Format.dateRenderer('d-m-Y')
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
			dataIndex: 'fn_anggih',
			menuDisabled: true,
			width: 60
		},{
			align: 'center',
			text: 'TENOR',
			dataIndex: 'fn_lamang',
			menuDisabled: true,
			width: 50
		},{
			align: 'center',
			text: 'OVD',
			dataIndex: 'fn_lamovd',
			menuDisabled: true,
			width: 50
		},{
			align: 'right',
			text: 'OS POKOK',
			dataIndex: 'fn_outnet',
			menuDisabled: true,
			width: 100,
			renderer: Ext.util.Format.numberRenderer('0,000,000')
		},{
			align: 'right',
			text: 'ANGS. TERTUNGGAK',
			dataIndex: 'fn_sisabyr',
			menuDisabled: true,
			width: 110,
			renderer: Ext.util.Format.numberRenderer('0,000,000')
		},{
			align: 'right',
			text: 'DENDA. TERTUNGGAK',
			dataIndex: 'fn_jlsisa',
			menuDisabled: true,
			width: 120,
			renderer: Ext.util.Format.numberRenderer('0,000,000')
		},{
			align: 'right',
			text: 'ANGS. JATUH TEMPO',
			dataIndex: 'fn_sisabyr1',
			menuDisabled: true,
			width: 120,
			renderer: Ext.util.Format.numberRenderer('0,000,000')
		},{
			align: 'right',
			text: 'TOTAL',
			dataIndex: 'fn_total',
			menuDisabled: true,
			width: 110,
			renderer: Ext.util.Format.numberRenderer('0,000,000')
		},{
			align: 'right',
			text: 'REALISASI',
			dataIndex: 'fn_jumlah',
			menuDisabled: true,
			width: 110,
			renderer: Ext.util.Format.numberRenderer('0,000,000')
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
		Ext.getCmp('cboCabang').setValue('');
		Ext.getCmp('txtKdCabang').setValue('');
		Ext.getCmp('cboPeriode').setValue('');
	}

	function fnPrint() {
		var xkdcabang = Ext.getCmp('txtKdCabang').getValue();
		var xblnperiode =  Ext.Date.format(Ext.getCmp('cboPeriode').getValue(), 'Y-m-d');

		if (xkdcabang == '') {
			xkdcabang = 0;
		}

		var popUp = Ext.create('Ext.window.Window', {
			modal: true,
			width: 950,
			height: 650,
			layout:'anchor',
			title: 'REPORT PENCAPAIAN PENAGIHAN',
			buttons: [{
				text: 'Close',
				handler: function() {
					vMask.hide();
					popUp.hide();
				}
			}]
		});

		popUp.add({html: '<iframe width="942" height="650" src="pencapaian/preview/'+ xkdcabang +'/'+ xblnperiode +'"></iframe>'});
		popUp.show();
	}

	var frmPencapaian = Ext.create('Ext.form.Panel', {
		border: false,
		frame: true,
		region: 'center',
		title: 'Pencapaian Penagihan',
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
				title: 'Report Pencapaian Penagihan',
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
								cboPeriode
							]
						}]
					}]
				},{
					anchor: '100%',
					style: 'padding: 5px',
					title: 'Data Pencapaian Penagihan',
					xtype: 'fieldset',
					items: [
						gridPencapaian
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
		target: frmPencapaian
	});

	function fnMaskShow() {
		frmPencapaian.mask('Please wait...');
	}

	function fnMaskHide() {
		frmPencapaian.unmask();
	}
	
	frmPencapaian.render(Ext.getBody());
	Ext.get('loading').destroy();

});