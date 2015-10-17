$(document).ready(function () {
    
    // 带有其他的下拉框控件
    $(".content").on('change', '.select-more', function () {
        var selected_val = $(this).val();
        if (selected_val === '其他') {
            $(this).next('input').val('');
            $(this).next('input').removeClass('hidden');
        } else {
            $(this).next('input').addClass('hidden');
            $(this).next('input').val(selected_val);
        }
    });

    // 日期控件
    $(".content").on('focusin', '.date-ymd', function () {
        $(this).datetimepicker({
            language: 'zh-CN',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
    });

    // 日期控件
    $(".content").on('focusin', '.date-ym', function () {
        $(this).datetimepicker({
            language: 'zh-CN',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 3,
            maxView: 4,
            minView: 3,
            forceParse: 0
        });
    });

    // 日期控件
    $(".content").on('focusin', '.date-y', function () {
        $(this).datetimepicker({
            language: 'zh-CN',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 4,
            maxView: 4,
            minView: 4,
            forceParse: 0
        });
    });

    // 上传控件 删除文件
    $('.content').on('click', '.delete_file', function () {
        $(this).closest(".file").remove();
    });
    
    // 日期控件 修复图标第一次点击无效的问题
    $('.content').on('click', '.date .add-on', function(){
       $(this).closest('.date').find('input').trigger("focus"); 
    });
    
    // 日期控件
    $(".content").on('focusin', '.city-bind', function () {
        $(this).find('.prov').removeClass('hidden');
        $(this).find('.city').removeClass('hidden');
        $(this).citySelect({
            nodata: "none",
            required: false
        });
        $(this).removeClass('city-bind');
        var old = $(this).find('.city-target').val();
        var old_ary = old.split('|');
        $(this).find(".prov option[text='"+old_ary[0]+"']").attr("selected", true);
        $(this).find(".prov").trigger("change");
        $(this).find(".city option[text='"+old_ary[1]+"']").attr("selected", true);
        $(this).find(".city").trigger("change");
        $(this).find('.address').val(old_ary[2]);
    });
    
    $(".content").on('change', '.address', function () {
        var that = $(this).closest('.city-data');
        that.find('.city-target').val(
                that.find('.prov').val() + '|' +
                that.find('.city').val() + '|' +
                that.find('.address').val()
                );
        
    });

});

// 多项控件类
var multi_component = {};

multi_component.addUnit = function(that, sequence){
    var box_body = $(that).closest('.box-footer').prev('.box-body');
    var tpl_id = $(that).attr("tpl");
    var param = {'sequence':sequence};
    $("#" + tpl_id).tmpl(param).appendTo(box_body);
};
multi_component.removeAddButton = function(that){
    $(that).closest('.box-footer').html("");
};
