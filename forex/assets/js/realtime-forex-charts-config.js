var RealtimeForexChartsWordpressOptions = {   
  debug: false,   
  pluginUrl: '' 
};

"use strict";
function RealtimeForexChartsOptions() {
  this.defaultAsset = 'EUR/USD'; //default currency pair
  this.defaultChartType = 'Smoothed line'; // default chart type

  this.backgroundColor = '#fff'; // chart area background color
  this.lineColor = '#00b5ad'; // chart line color (and positive candle color in case of candlestick chart)
  this.negativeLineColor = '#FF2330'; // negative candle color (in case of candlestick chart)
  this.lineThickness = 1; // chart line thickness
  this.legendTextColor = '#000'; // legend text color
  this.gridColor = '#ccc'; // grid color
  this.gridColorThickness = 1; // grid thickness
  this.valuesTextColor = '#3B06BA'; // text color of value axis
  this.balloonTextColor = '#000'; // balloon text color
  this.balloonFillColor = '#fff'; // balloon fill (background) color
  this.cursorLineColor = 'green'; // cursor line color
  this.scrollbarEnabled = true; // enable/disable scrollbar
  this.scrollbarHeight = 100; // height of scrollbar
  this.scrollbarTextColor = '#fff'; // scrollbar text color
  this.scrollbarGridColor = '#fff'; // scrollbar grid color
  this.scrollbarBackgroundColor = 'grey'; // scrollbar background color
  this.scrollbarGraphFillColor = '#2C8B86'; // scrollbar chart fill color
  this.scrollbarSelectedBackgroundColor = '#E0E0E0'; // scrollbar background color (selected period)
  this.scrollbarSelectedGraphFillColor = '#00b5ad'; // scrollbar chart fill color (selected period)
};