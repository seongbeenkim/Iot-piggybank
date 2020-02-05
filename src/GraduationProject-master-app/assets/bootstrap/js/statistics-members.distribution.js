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

var handleDonutChart = function (option) {
	"use strict";
	if ($('#donut-chart').length !== 0) {

        $.plot($("#donut-chart"), option.data1,
        {
            series: {
                pie: {
                    innerRadius: 0.3,
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.01
                    },
                    label: {
                       formatter: formatter,
                       show: true,
                       radius: 1
                    },
                }
            },
            grid:{borderWidth:0, hoverable: true, clickable: true},
            legend: {
                show: true,
            },
            tooltip: {
                show: true,
                content: "%s<br />%p.1%", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });
    }
};

var handleDonutChartGender = function (option) {
	"use strict";
	if ($('#donut-chart-gender').length !== 0) {

        $.plot($("#donut-chart-gender"), option.data2,
        {
            series: {
                pie: {
                    innerRadius: 0.5,
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.01
                    },
                    label: {
                       formatter: formatter,
                       show: true,
                       radius: 1
                    },
                }
            },
            grid:{borderWidth:0, hoverable: true, clickable: true},
            legend: {
                show: true,
            },
            tooltip: {
                show: true,
                content: "%s<br />%p.1%", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });

    }
};

var handleBarChartAge = function (option) {
	"use strict";
	if ($('#bar-chart-age').length !== 0) {
        $.plot("#bar-chart-age", [ {data: option.data3, color: blueDark} ], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.4,
                    align: 'center',
                    fill: true,
                    fillColor: blue,
                    zero: true,
                    numbers: {
                        show: true,
                        formatter: function (value) {
                            return value + '%';
                        },
                        xAlign: function(x){
                            return x;
                        },
                        font: '12pt Arial',
                        fontColor: aquaLight
                    }
                }
            },
            xaxis: {
                mode: "categories",
                tickColor: '#ddd',
				tickLength: 0
            },
            grid:{
                borderWidth:0, hoverable: true, clickable: true
            }
        });
    }
};

var handleBarChartAddress = function (option) {
	"use strict";
	if ($('#bar-chart-address').length !== 0) {
        $.plot("#bar-chart-address", [ {data: option.data4, color: aquaDark} ], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.7,
                    align: 'center',
                    fill: true,
                    fillColor: aqua,
                    zero: true,
                    numbers: {
                        show: true,
                        formatter: function (value) {
                            return value + '%';
                        },
                        xAlign: function(x){
                            return x;
                        },
                        font: '10pt Arial',
                        fontColor: purpleDark
                    }
                    ,stack: true
                }
            },
            xaxis: {
                mode: "categories",
                tickColor: '#ddd',
				tickLength: 0
            },
            grid:{
                borderWidth:0, hoverable: true, clickable: true
            }
        });
    }
};

var handleDonutChartMarriage = function (option) {
	"use strict";
	if ($('#donut-chart-marriage').length !== 0) {

        $.plot($("#donut-chart-marriage"), option.data5,
        {
            series: {
                pie: {
                    innerRadius: 0.3,
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.01
                    },
                    label: {
                       formatter: formatter,
                       show: true,
                       radius: 1
                    },
                }
            },
            grid:{borderWidth:0, hoverable: true, clickable: true},
            legend: {
                show: true,
            },
            tooltip: {
                show: true,
                content: "%s<br />%p.1%", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });
    }
};

var handleDonutChartChild = function (option) {
	"use strict";
	if ($('#donut-chart-child').length !== 0) {

        $.plot($("#donut-chart-child"), option.data6,
        {
            series: {
                pie: {
                    innerRadius: 0.3,
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.01
                    },
                    label: {
                       formatter: formatter,
                       show: true,
                       radius: 1
                    },
                }
            },
            grid:{borderWidth:0, hoverable: true, clickable: true},
            legend: {
                show: true,
            },
            tooltip: {
                show: true,
                content: "%s<br />%p.1%", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });
    }
};

var handleBarChartJob = function (option) {
	"use strict";
	if ($('#bar-chart-job').length !== 0) {
        $.plot("#bar-chart-job", [ {data: option.data7, color: blueDark} ], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.4,
                    align: 'center',
                    fill: true,
                    fillColor: blue,
                    zero: true,
                    numbers: {
                        show: true,
                        formatter: function (value) {
                            return value + '%';
                        },
                        xAlign: function(x){
                            return x;
                        },
                        font: '12pt Arial',
                        fontColor: aquaLight
                    }
                }
            },
            xaxis: {
                mode: "categories",
                tickColor: '#ddd',
				tickLength: 0
            },
            grid:{
                borderWidth:0, hoverable: true, clickable: true
            }
        });
    }
};

var handleBarChartWorking = function (option) {
	"use strict";
	if ($('#bar-chart-working').length !== 0) {
        $.plot("#bar-chart-working", [ {data: option.data8, color: blueDark} ], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.4,
                    align: 'center',
                    fill: true,
                    fillColor: blue,
                    zero: true,
                    numbers: {
                        show: true,
                        formatter: function (value) {
                            return value + '%';
                        },
                        xAlign: function(x){
                            return x;
                        },
                        font: '12pt Arial',
                        fontColor: aquaLight
                    }
                }
            },
            xaxis: {
                mode: "categories",
                tickColor: '#ddd',
				tickLength: 0
            },
            grid:{
                borderWidth:0, hoverable: true, clickable: true
            }
        });
    }
};

var handleDonutChartHouse = function (option) {
	"use strict";
	if ($('#donut-chart-house').length !== 0) {

        $.plot($("#donut-chart-house"), option.data9,
        {
            series: {
                pie: {
                    innerRadius: 0.3,
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.01
                    },
                    label: {
                       formatter: formatter,
                       show: true,
                       radius: 1
                    },
                }
            },
            grid:{borderWidth:0, hoverable: true, clickable: true},
            legend: {
                show: true,
            },
            tooltip: {
                show: true,
                content: "%s<br />%p.1%", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });
    }
};

var handleDonutChartCar = function (option) {
	"use strict";
	if ($('#donut-chart-car').length !== 0) {

        $.plot($("#donut-chart-car"), option.data10,
        {
            series: {
                pie: {
                    innerRadius: 0.3,
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.01
                    },
                    label: {
                       formatter: formatter,
                       show: true,
                       radius: 1
                    },
                }
            },
            grid:{borderWidth:0, hoverable: true, clickable: true},
            legend: {
                show: true,
            },
            tooltip: {
                show: true,
                content: "%s<br />%p.1%", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });
    }
};

var handleBarChartLive = function (option) {
	"use strict";
	if ($('#bar-chart-live').length !== 0) {
        $.plot("#bar-chart-live", [ {data: option.data11, color: blueDark} ], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.4,
                    align: 'center',
                    fill: true,
                    fillColor: blue,
                    zero: true,
                    numbers: {
                        show: true,
                        formatter: function (value) {
                            return value + '%';
                        },
                        xAlign: function(x){
                            return x;
                        },
                        font: '12pt Arial',
                        fontColor: aquaLight
                    }
                }
            },
            xaxis: {
                mode: "categories",
                tickColor: '#ddd',
				tickLength: 0
            },
            grid:{
                borderWidth:0, hoverable: true, clickable: true
            }
        });
    }
};

var handleBarChartJoin = function (option) {
	"use strict";
	if ($('#bar-chart-join').length !== 0) {
        $.plot("#bar-chart-join", [ {data: option.data12, color: blueDark} ], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.4,
                    align: 'center',
                    fill: true,
                    fillColor: blue,
                    zero: true,
                    numbers: {
                        show: true,
                        formatter: function (value) {
                            return value + '%';
                        },
                        xAlign: function(x){
                            return x;
                        },
                        font: '12pt Arial',
                        fontColor: aquaLight
                    }
                }
            },
            xaxis: {
                mode: "categories",
                tickColor: '#ddd',
				tickLength: 0
            },
            grid:{
                borderWidth:0, hoverable: true, clickable: true
            }
        });
    }
};

var StatisticsMembersDistribution = function () {
	"use strict";
    return {
        //main function
        init: function (options) {
            handleDonutChart(options);
            handleDonutChartGender(options);
            handleBarChartAge(options);
            handleBarChartAddress(options);
            handleDonutChartMarriage(options);
            handleDonutChartChild(options);
            handleBarChartJob(options);
            handleBarChartWorking(options);
            handleDonutChartHouse(options);
            handleDonutChartCar(options);
            handleBarChartLive(options);
            handleBarChartJoin(options);
        }
    };
}();
