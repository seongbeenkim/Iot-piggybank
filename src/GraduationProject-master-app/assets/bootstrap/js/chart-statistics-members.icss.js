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

var handleStackedBarChartGender = function(option) {
    "use strict";

    var stackedBarChartData = [{
        key: '여성',
        'color' : red,
        values: option.dataGenderWoman
    },{
        key: '남성',
        'color' : blue,
        values: option.dataGenderMan
    }];

    nv.addGraph({
        generate: function() {
            var stackedBarChart = nv.models.multiBarChart()
                .stacked(true)
                .reduceXTicks(false)
                .showControls(false);

            stackedBarChart.xAxis
                .tickFormat(function(d) {
                  return ('I-'+d);
            });
            stackedBarChart.yAxis
                .tickFormat(function(d) {
                  return (d+'%');
            });

            var svg = d3.select('#nv-stacked-bar-gender').append('svg').datum(stackedBarChartData);
            svg.transition().duration(0).call(stackedBarChart);
            return stackedBarChart;
        }
    });
};


var ChartStatisticsMembersIcss = function () {
	"use strict";
    return {
        //main function
        init: function (options) {
            handleStackedBarChartGender(options);
        }
    };
}();
