/*
 Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
 Version: 1.7.0
 Author: Sean Ngu
 Website: http://www.seantheme.com/color-admin-v1.7/admin/
 */

var handleDatepicker = function() {
    $('#datepicker-default').datepicker({
        format: 'yyyy-mm-dd',
        language : 'kr',
        todayHighlight: true,
        defaultDate : '-2m'
    }).datepicker("setDate", new Date());

    $('#datepicker-default2').datepicker({
        format: 'yyyy-mm-dd',
        language : 'kr',
        todayHighlight: true
    }).on('changeDate', function() {
        if ($(this).val() < $('#datepicker-default').val()){
            alert("끝 날짜가 시작날짜보다 이전일수 없습니다.")
         }
    }).datepicker("setDate", new Date());

    // 현재기준 이전 1달전 일 설정
    $('#datepicker-date').datepicker({
        format: 'yyyy-mm-dd',
        language : 'kr',
        todayHighlight: true,
        defaultDate : '-2m'
    }).datepicker("setDate", '-1m');

    $('#datepicker-date2').datepicker({
        format: 'yyyy-mm-dd',
        language : 'kr',
        todayHighlight: true
    }).on('changeDate', function() {
        if ($(this).val() < $('#datepicker-default').val()){
            alert("끝 날짜가 시작날짜보다 이전일수 없습니다.")
         }
    }).datepicker("setDate", new Date());

    // 현재기준 이전 1년전 월 설정
    $('#datepicker-month').datepicker({
        format: 'yyyy-mm',
        language : 'kr',
        viewMode: "months",
        minViewMode: "months",
        todayHighlight: true,
    }).datepicker("setDate", '-11m');

    $('#datepicker-month2').datepicker({
        format: 'yyyy-mm',
        language : 'kr',
        viewMode: "months",
        minViewMode: "months",
        todayHighlight: true
    }).on('changeDate', function() {
        if ($(this).val() < $('#datepicker-month').val()){
            alert("끝 날짜가 시작날짜보다 이전일수 없습니다.")
         }
    }).datepicker("setDate", new Date());

    $('#datepicker-year').datepicker({
        format: 'yyyy',
        language : 'kr',
        viewMode: "years",
        minViewMode: "years",
        todayHighlight: true,
    }).datepicker("setDate", new Date());

    $('#datepicker-year2').datepicker({
        format: 'yyyy',
        language : 'kr',
        viewMode: "years",
        minViewMode: "years",
        todayHighlight: true,
    }).on('changeDate', function() {
        if ($(this).val() < $('#datepicker-year').val()){
            alert("끝 날짜가 시작날짜보다 이전일수 없습니다.")
         }
    }).datepicker("setDate", new Date());

    $('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    $('.input-daterange').datepicker({
        todayHighlight: true
    });
    $('#datepicker-disabled-past').datepicker({
        todayHighlight: true
    });
    $('#datepicker-autoClose').datepicker({
        format: 'yyyy/mm/dd',
        language : 'kr',
        todayHighlight: true,
        autoclose: true
    });
    $('#datepicker-autoClose2').datepicker({
        format: 'yyyy/mm/dd',
        language : 'kr',
        todayHighlight: true,
        autoclose: true
    });
};

var FormDatePickerPlugins = function () {
    "use strict";
    return {
        //main function
        init: function () {
            handleDatepicker();
        }
    };
}();
