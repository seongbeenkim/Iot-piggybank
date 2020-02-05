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

var formatter = function (label, series) {
   return label + '<br />' + series.percent.toFixed(1) +'%';
};

var handleStackedChartStagePerson = function (option) {
	"use strict";

    var options = {
        xaxis: {  tickColor: 'transparent',  ticks: option.data1[0].label},
        yaxis: {  tickColor: '#ddd', ticksLength: 10},
        grid: {
            hoverable: true,
            tickColor: "#ccc",
            borderWidth: 0,
            borderColor: 'rgba(0,0,0,0.2)'
        },
        series: {
            stack: true,
            lines: { show: false, fill: false, steps: false },
            bars: { show: true, barWidth: 0.5, align: 'center', fillColor: null },
            highlightColor: 'rgba(0,0,0,0.8)'
        },
        legend: {
            show: true,
            labelBoxBorderColor: '#ccc',
            position: 'ne',
            noColumns: 1
        }
    };
    var xData = [
        {
            data:option.data1[1].person1,
            color: orangeDark,
            label: '5명',
            bars: {
                fillColor: orangeDark
            }
        },
        {
            data:option.data1[2].person2,
            color: purple,
            label: '7명',
            bars: {
                fillColor: purple
            }
        },
        {
            data:option.data1[3].person3,
            color: aquaDark,
            label: '9명',
            bars: {
                fillColor: aquaDark
            }
        },
        {
            data:option.data1[4].person4,
            color: green,
            label: '13명',
            bars: {
                fillColor: green
            }
        }
    ];
    $.plot("#stacked-chart-gender", xData, options);

    function showTooltip2(x, y, contents) {
        $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css( {
            top: y,
            left: x + 35
        }).appendTo("body").fadeIn(200);
    }
    var previousXValue = null;
    var previousYValue = null;
    $("#stacked-chart-gender").bind("plothover", function (event, pos, item) {
        if (item) {
            var y = item.datapoint[1] - item.datapoint[2];

            if (previousXValue != item.series.label || y != previousYValue) {
                previousXValue = item.series.label;
                previousYValue = y;
                $("#tooltip").remove();

                showTooltip2(item.pageX, item.pageY, y + " " + item.series.label);
            }
        }
        else {
            $("#tooltip").remove();
            previousXValue = null;
            previousYValue = null;
        }
    });
};

var StatisticsMembersStage = function () {
	"use strict";
    return {
        //main function
        init: function (options) {
            handleStackedChartStagePerson(options);
        }
    };
}();
