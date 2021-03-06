
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

var handleInteractiveChartStage = function (options) {
	"use strict";
    function showTooltip(x, y, contents) {
        $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css( {
            top: y - 45,
            left: x - 55
        }).appendTo("body").fadeIn(200);
    }
	if ($('#interactive-chart-stage').length !== 0) {

        $.plot($("#interactive-chart-stage"), [
                {
                    data:  options.data1,
                    label: "스테이지 개설",
                    color: blue,
                    lines: { show: true, fill:false, lineWidth: 2 },
                    points: { show: true, radius: 3, fillColor: '#fff' },
                    shadowSize: 0
                }
            ],
            {
                xaxis: {  ticks:options.xLabel, tickDecimals: 0, tickColor: '#ddd' },
                yaxis: {  ticks: 10, tickColor: '#ddd', min: 0, max: 200 },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#ddd",
                    borderWidth: 1,
                    backgroundColor: '#fff',
                    borderColor: '#ddd'
                },
                legend: {
                    labelBoxBorderColor: '#ddd',
                    margin: 10,
                    noColumns: 1,
                    show: true
                }
            }
        );
        var previousPoint = null;
        $("#interactive-chart-stage").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x);
            $("#y").text(pos.y);
            if (item) {
                if (previousPoint !== item.dataIndex) {
                    previousPoint = item.dataIndex;
                    $("#tooltip").remove();
                    var y = item.datapoint[1];

                    var content = item.series.label + " " + y+"명";
                    showTooltip(item.pageX, item.pageY, content);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
            event.preventDefault();
        });
    }
};

var StatisticsActivityDayStage2 = function () {
	"use strict";
    return {
        //main function
        init: function (options) {
            handleInteractiveChartStage(options);
        }
    };
}();
