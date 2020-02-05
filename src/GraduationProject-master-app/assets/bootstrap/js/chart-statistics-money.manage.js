/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 2.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v2.0/admin/html/
*/

var blue		= '#348fe2',
    blueLight	= '#5da5e8',
    blueDark	= '#1993E4',
    aqua		= '#49b6d6',
    aquaLight	= '#6dc5de',
    aquaDark	= '#3a92ab',
    green		= '#00acac',
    greenLight	= '#33bdbd',
    greenDark	= '#008a8a',
    orange		= '#f59c1a',
    orangeLight	= '#f7b048',
    orangeDark	= '#c47d15',
    dark		= '#2d353c',
    grey		= '#b6c2c9',
    purple		= '#727cb6',
    purpleLight	= '#8e96c5',
    purpleDark	= '#5b6392',
    red         = '#ff5b57';

var handleDonutChartMoneyTotal = function(option) {
    "use strict";

    nv.addGraph(function() {
      var chart = nv.models.pieChart()
          .x(function(d) { return d.label })
          .y(function(d) { return d.value })
          .showLabels(true)
          .labelThreshold(.05)
          .labelType("percent")
          .donut(true)
          .donutRatio(0.35);

        d3.select('#nv-donut-total').append('svg')
            .datum(option.dataTotal)
            .transition().duration(350)
            .call(chart);

        return chart;
    });
};

var handleDonutChartMoneyProceeding = function(option) {
    "use strict";

    nv.addGraph(function() {
      var chart = nv.models.pieChart()
          .x(function(d) { return d.label })
          .y(function(d) { return d.value })
          .showLabels(true)
          .labelThreshold(.05)
          .labelType("percent")
          .donut(true)
          .donutRatio(0.35);

        d3.select('#nv-donut-procedding').append('svg')
            .datum(option.dataProceeding)
            .transition().duration(350)
            .call(chart);

        return chart;
    });
};

var ChartStatisticsMoney = function () {
	"use strict";
    return {
        //main function
        init: function (options) {
            handleDonutChartMoneyTotal(options);
            handleDonutChartMoneyProceeding(options);
        }
    };
}();
