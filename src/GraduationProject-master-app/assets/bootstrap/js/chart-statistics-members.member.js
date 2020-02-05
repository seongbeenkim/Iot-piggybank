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

var handleDonutChartMembersGrade = function(option) {
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

        d3.select('#nv-donut-grade').append('svg')
            .datum(option.dataGrade)
            .transition().duration(350)
            .call(chart);

        return chart;
    });
};

var handleDonutChartMembersGender = function(option) {
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

        d3.select('#nv-donut-gender').append('svg')
            .datum(option.dataGender)
            .transition().duration(350)
            .call(chart);

        return chart;
    });
};

var handleBarChartMembersAge = function(option) {
    "use strict";

    var barChartData = [{
        key: 'Cumulative Return',
        values: option.dataAge
    }];

    nv.addGraph(function() {
        var barChart = nv.models.discreteBarChart()
            .x(function(d) { return d.label })
            .y(function(d) { return d.value })
            .showValues(true)
            .duration(250);

        barChart.yAxis.axisLabel("비율(%)");
        barChart.xAxis.axisLabel('연령대');

        d3.select('#nv-bar-age').append('svg').datum(barChartData).call(barChart);
        nv.utils.windowResize(barChart.update);

        return barChart;
    });
}

var handleBarChartMembersAddress = function(option) {
    "use strict";

    var barChartData = [{
        key: 'Cumulative Return',
        values: option.dataAddress
    }];

    nv.addGraph(function() {
        var barChart = nv.models.discreteBarChart()
            .x(function(d) { return d.label })
            .y(function(d) { return d.value })
            .showValues(true)
            .duration(250);

        barChart.yAxis.axisLabel("비율(%)");
        barChart.xAxis.axisLabel('지역');

        d3.select('#nv-bar-address').append('svg').datum(barChartData).call(barChart);
        nv.utils.windowResize(barChart.update);

        return barChart;
    });
}

var handleDonutChartMembersMarriage = function(option) {
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

        d3.select('#nv-donut-marriage').append('svg')
            .datum(option.dataMarriage)
            .transition().duration(350)
            .call(chart);

        return chart;
    });
};

var handleDonutChartMembersChild = function(option) {
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

        d3.select('#nv-donut-child').append('svg')
            .datum(option.dataChild)
            .transition().duration(350)
            .call(chart);

        return chart;
    });
};

var handleBarChartMembersJob = function(option) {
    "use strict";

    var barChartData = [{
        key: 'Cumulative Return',
        values: option.dataJob
    }];

    nv.addGraph(function() {
        var barChart = nv.models.discreteBarChart()
            .x(function(d) { return d.label })
            .y(function(d) { return d.value })
            .showValues(true)
            .duration(250);

        barChart.yAxis.axisLabel("비율(%)");
        barChart.xAxis.axisLabel('지역');

        d3.select('#nv-bar-job').append('svg').datum(barChartData).call(barChart);
        nv.utils.windowResize(barChart.update);

        return barChart;
    });
}

var handleBarChartMembersWorking = function(option) {
    "use strict";

    var barChartData = [{
        key: 'Cumulative Return',
        values: option.dataWorking
    }];

    nv.addGraph(function() {
        var barChart = nv.models.discreteBarChart()
            .x(function(d) { return d.label })
            .y(function(d) { return d.value })
            .showValues(true)
            .duration(250);

        barChart.yAxis.axisLabel("비율(%)");
        barChart.xAxis.axisLabel('지역');

        d3.select('#nv-bar-working').append('svg').datum(barChartData).call(barChart);
        nv.utils.windowResize(barChart.update);

        return barChart;
    });
}

var handleDonutChartMembersHouse = function(option) {
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

        d3.select('#nv-donut-house').append('svg')
            .datum(option.dataHouse)
            .transition().duration(350)
            .call(chart);

        return chart;
    });
};

var handleDonutChartMembersCar = function(option) {
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

        d3.select('#nv-donut-car').append('svg')
            .datum(option.dataCar)
            .transition().duration(350)
            .call(chart);

        return chart;
    });
};

var handleBarChartMembersLive = function(option) {
    "use strict";

    var barChartData = [{
        key: 'Cumulative Return',
        values: option.dataLive
    }];

    nv.addGraph(function() {
        var barChart = nv.models.discreteBarChart()
            .x(function(d) { return d.label })
            .y(function(d) { return d.value })
            .showValues(true)
            .duration(250);

        barChart.yAxis.axisLabel("비율(%)");
        barChart.xAxis.axisLabel('지역');

        d3.select('#nv-bar-live').append('svg').datum(barChartData).call(barChart);
        nv.utils.windowResize(barChart.update);

        return barChart;
    });
}

var handleBarChartMembersJoin = function(option) {
    "use strict";

    var barChartData = [{
        key: 'Cumulative Return',
        values: option.dataJoin
    }];

    nv.addGraph(function() {
        var barChart = nv.models.discreteBarChart()
            .x(function(d) { return d.label })
            .y(function(d) { return d.value })
            .showValues(true)
            .duration(250);

        barChart.yAxis.axisLabel("비율(%)");
        barChart.xAxis.axisLabel('지역');

        d3.select('#nv-bar-join').append('svg').datum(barChartData).call(barChart);
        nv.utils.windowResize(barChart.update);

        return barChart;
    });
}

var ChartStatisticsMembers = function () {
	"use strict";
    return {
        //main function
        init: function (options) {
            handleDonutChartMembersGrade(options);
            handleDonutChartMembersGender(options);
            handleBarChartMembersAge(options);
            handleBarChartMembersAddress(options);
            handleDonutChartMembersMarriage(options);
            handleDonutChartMembersChild(options);
            handleBarChartMembersJob(options);
            handleBarChartMembersWorking(options);
            handleDonutChartMembersHouse(options);
            handleDonutChartMembersCar(options);
            handleBarChartMembersLive(options);
            handleBarChartMembersJoin(options);
        }
    };
}();
