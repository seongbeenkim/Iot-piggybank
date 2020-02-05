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

var handleStackedChartIcssGender = function (option) {
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
            data:option.data1[1].woman,
            color: orangeDark,
            label: '여성',
            bars: {
                fillColor: orangeDark
            }
        },
        {
            data:option.data1[2].man,
            color: purple,
            label: '남성',
            bars: {
                fillColor: purple
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

var handleStackedChartIcssAge = function (option) {
	"use strict";

    var options = {
        xaxis: {  tickColor: 'transparent',  ticks: option.data2[0].label},
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
            data:option.data2[1].twenty,
            color: orangeDark,
            label: '20대',
            bars: {
                fillColor: orangeDark
            }
        },
        {
            data:option.data2[2].thirty,
            color: blueDark,
            label: '30대',
            bars: {
                fillColor: blueDark
            }
        },
        {
            data:option.data2[3].fourty,
            color: orange,
            label: '40대',
            bars: {
                fillColor: orange
            }
        },
        {
            data:option.data2[4].fifty,
            color: blue,
            label: '50대',
            bars: {
                fillColor: blue
            }
        },
        {
            data:option.data2[5].sixty,
            color: greenDark,
            label: '60대',
            bars: {
                fillColor: greenDark
            }
        },
        {
            data:option.data2[6].seventy,
            color: aquaDark,
            label: '70대',
            bars: {
                fillColor: aquaDark
            }
        },
        {
            data:option.data2[7].eightty,
            color: red,
            label: '80대이상',
            bars: {
                fillColor: red
            }
        }
    ];
    $.plot("#stacked-chart-age", xData, options);

    function showTooltip2(x, y, contents) {
        $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css( {
            top: y,
            left: x + 35
        }).appendTo("body").fadeIn(200);
    }
    var previousXValue = null;
    var previousYValue = null;
    $("#stacked-chart-age").bind("plothover", function (event, pos, item) {
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

var handleStackedChartIcssAddress = function (option) {
	"use strict";

    var options = {
        xaxis: {  tickColor: 'transparent',  ticks: option.data3[0].label},
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
            data:option.data3[1].addr1,
            color: blue,
            label: '서울',
            bars: {
                fillColor: blue
            }
        },
        {
            data:option.data3[2].addr2,
            color: aqua,
            label: '부산',
            bars: {
                fillColor: aqua
            }
        },
        {
            data:option.data3[3].addr3,
            color: green,
            label: '대구',
            bars: {
                fillColor: green
            }
        },
        {
            data:option.data3[4].addr4,
            color: orange,
            label: '인천',
            bars: {
                fillColor: orange
            }
        },
        {
            data:option.data3[5].addr5,
            color: purple,
            label: '광주',
            bars: {
                fillColor: purple
            }
        },
        {
            data:option.data3[6].addr6,
            color: blueLight,
            label: '대전',
            bars: {
                fillColor: blueLight
            }
        },
        {
            data:option.data3[7].addr7,
            color: aquaLight,
            label: '울산',
            bars: {
                fillColor: aquaLight
            }
        },
        {
            data:option.data3[8].addr8,
            color: greenLight,
            label: '세종',
            bars: {
                fillColor: greenLight
            }
        },
        {
            data:option.data3[9].addr9,
            color: orangeLight,
            label: '경기',
            bars: {
                fillColor: orangeLight
            }
        },
        {
            data:option.data3[10].addr10,
            color: purpleLight,
            label: '강원',
            bars: {
                fillColor: purpleLight
            }
        },
        {
            data:option.data3[11].addr11,
            color: blueDark,
            label: '충북',
            bars: {
                fillColor: blueDark
            }
        },
        {
            data:option.data3[12].addr12,
            color: aquaDark,
            label: '충남',
            bars: {
                fillColor: aquaDark
            }
        },
        {
            data:option.data3[13].addr13,
            color: greenDark,
            label: '전북',
            bars: {
                fillColor: greenDark
            }
        },
        {
            data:option.data3[14].addr14,
            color: orangeDark,
            label: '전남',
            bars: {
                fillColor: orangeDark
            }
        },
        {
            data:option.data3[15].addr15,
            color: purpleDark,
            label: '경북',
            bars: {
                fillColor: purpleDark
            }
        },
        {
            data:option.data3[16].addr16,
            color: red,
            label: '경남',
            bars: {
                fillColor: red
            }
        },
        {
            data:option.data3[17].addr17,
            color: grey,
            label: '제주',
            bars: {
                fillColor: grey
            }
        }
    ];
    console.log(option.data3[15].addr16);

    $.plot("#stacked-chart-address", xData, options);

    function showTooltip2(x, y, contents) {
        $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css( {
            top: y,
            left: x + 35
        }).appendTo("body").fadeIn(200);
    }
    var previousXValue = null;
    var previousYValue = null;
    $("#stacked-chart-address").bind("plothover", function (event, pos, item) {
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


var StatisticsMembersIcssGender = function () {
	"use strict";
    return {
        //main function
        init: function (options) {
            handleStackedChartIcssGender(options);
            handleStackedChartIcssAge(options);
            //handleStackedChartIcssAddress(options);
        }
    };
}();
