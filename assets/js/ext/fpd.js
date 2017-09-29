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
		handler: fnShowData1
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
		handler: fnShowData2
	};

	// FUNCTIONS
	function fnShowData1() {

	}

	function fnShowData2() {

	}

	function fnReset1() {

	}

	function fnReset2() {

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
				}]
			},{
				id: 'tab2',
				bodyStyle: 'background-color: '.concat(gBasePanel),
				border: false,
				frame: false,
				title: 'Report Surveyor',
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