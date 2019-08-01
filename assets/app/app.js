/**
 * Form ajax action 
 */
$(document).on("submit", ".ajax_post_form", function (arg) {
    arg.preventDefault();
    // start_process();
    var action = $(this).attr("action");
    var submitdata = $(this).serialize();
    var refid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: action,
        data: submitdata,
        dataType: "JSON",
        success: function (response) {
            $('#alert-message').fadeIn();
            $('#alert-message').text(response.message);
            if (response.status == true) {
                window.location.href = response.redirect;
            }
        }
    });
    //alert();
});
var page = 1;
var paging = false;
var perpagerecords = 3;
var search = '';
var totpages = 0;
loadDatatable();
function loadDatatable() {
    if (paging == false) {
        // load the paging
        loadPagingArea();
    }
    var reqdata = {
        page: page,
        perpagerecords: perpagerecords,
        search: search
    };
    var action = $('#table').attr('data-source');
    var module = $('#table').attr('data-module');
    $.ajax({
        type: "POST",
        url: action,
        data: reqdata,
        dataType: "JSON",
        success: function (response) {
            if (response.status) {
                // load the data
                var htdata = '';
                $.each(response.data.data, function (index, element) {
                    htdata += '<tr>';
                    htdata += '<td>' + element.id + '</td>';
                    htdata += '<td>' + element.fullname + '</td>';
                    htdata += '<td>' + element.emailid + '</td>';
                    htdata += '<td>' + element.phone + '</td>';
                    htdata += '<td>' + element.address + '</td>';
                    htdata += '<td>';
                    htdata += '<a href="' + element.show + '" class="btn btn-primary"><i class="fa fa-eye"></i></a> ';
                    htdata += '<a href="' + element.edit + '" class="btn btn-success"><i class="fa fa-pencil"></i></a> ';
                    htdata += '<a  href="' + element.delete + '" class="btn btn-danger"><i class="fa fa-times"></i></a> ';
                    htdata += '</td>';
                    htdata += '</tr>';
                });
                $('#table tbody').html(htdata);
            }
        }
    });
}
function loadPagingArea() {
    var reqdata = {
        perpagerecord: perpagerecords
    }
    var action = $('#paging').attr('data-source');
    $.ajax({
        type: "POST",
        url: action,
        data: reqdata,
        dataType: "JSON",
        success: function (response) {
            if (response.status) {
                if (response.pages > 0) {
                    page = 1;
                    paging = true;
                    totpages = response.pages;
                    var htdata = '<li class="prev" data-page=""><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
                    for (var i = 0; i < response.pages; i++) {
                        var j = i + 1;
                        if (i == 0) {
                            htdata += '<li id="page-id-' + j + '" class="active page-nav" data-page="' + j + '"><a href="#">' + j + '</a></li>';
                        }
                        else {
                            htdata += '<li id="page-id-' + j + '" class="page page-nav" data-page="' + j + '"><a href="#">' + j + '</a></li>';
                        }
                    }
                    htdata += '<li class="next" data-page="' + response.nextpage + '"><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
                    $('#paging').html(htdata);
                }
            }
        }
    });
}
$(document).on('click', '.page', function (arg) {
    arg.preventDefault();
    page = $(this).attr('data-page');
    $('.page-nav.active').addClass('page');
    $('.page-nav.active').removeClass('active');
    $('#page-id-' + page).removeClass('page');
    $('#page-id-' + page).addClass('active');
    // set the prev data
    if ($('.prev').attr('data-page') == "") {
        $('.prev').attr('data-page', "1");
    }
    else {
        var ipage = parseInt(page);
        ipage = ipage - 1;
        $('.prev').attr('data-page', ipage);
    }

    // set the next data
    if ($('.next').attr('data-page') != "") {
        var ipage = parseInt(page);
        ipage = ipage + 1;
        $('.next').attr('data-page', ipage);
    }
    loadDatatable();
});
$(document).on('click', '.next', function (arg) {
    arg.preventDefault();
    if (page == $(this).attr('data-page')) {
        return false;
    }
    page = $(this).attr('data-page');

    $('.page-nav.active').addClass('page');
    $('.page-nav.active').removeClass('active');
    $('#page-id-' + page).removeClass('page');
    $('#page-id-' + page).addClass('active');
    // set the prev data
    if ($('.prev').attr('data-page') == "") {
        $('.prev').attr('data-page', "1");
    }
    else {
        var ipage = parseInt(page);
        ipage = ipage - 1;
        $('.prev').attr('data-page', ipage);
    }

    // set the next data
    if ($('.next').attr('data-page') != "") {
        var ipage = parseInt(page);
        if (totpages == ipage) {

        }
        else {
            ipage = ipage + 1;
            $('.next').attr('data-page', ipage);
        }
    }
    loadDatatable();
});
$(document).on('click', '.prev', function (arg) {
    arg.preventDefault();
    if (page == $(this).attr('data-page') || $(this).attr('data-page') == '' || parseInt($(this).attr('data-page')) == 0) {
        return false;
    }
    page = $(this).attr('data-page');
    $('.page-nav.active').addClass('page');
    $('.page-nav.active').removeClass('active');
    $('#page-id-' + page).removeClass('page');
    $('#page-id-' + page).addClass('active');
    // set the prev data
    if ($('.prev').attr('data-page') != "") {
        var ipage = parseInt(page);
        ipage = ipage - 1;
        $('.prev').attr('data-page', ipage);
    }

    // set the next data
    if ($('.next').attr('data-page') != "") {
        var ipage = parseInt(page);
        ipage = ipage + 1;
        $('.next').attr('data-page', ipage);
    }
    loadDatatable();
});

/**
 * Show page actions
 */
$(document).on('click', '#new-activity', function (arg) {
    arg.preventDefault();
    $('.list-view').fadeOut();
    $('.new-view').fadeIn();
});
$(document).on('click', '#create-activity-cancel', function (arg) {
    arg.preventDefault();
    $('.new-view').fadeOut();
    $('.list-view').fadeIn();
});

getActivityList();
function getActivityList() {
    var action = $('#table').attr('data-source');
    $.ajax({
        type: "GET",
        url: action,
        dataType: "JSON",
        success: function (response) {
            if (response.status) {
                // load the data
                var htdata = '';
                var sr = 0;
                $.each(response.data, function (index, element) {
                    sr++;
                    htdata += '<tr>';
                    htdata += '<td>' + sr + '</td>';
                    htdata += '<td>' + element.type + '</td>';
                    htdata += '<td>' + element.created_on + '</td>';
                    htdata += '<td>' + element.description + '</td>';
                    htdata += '<td>' + element.next_act_description + '<br><small>Next Activity : ' + element.next_time + '</small></td>';
                    // htdata += '<td>';
                    // htdata += '<a href="' + element.edit + '" class="btn btn-success"><i class="fa fa-pencil"></i></a> ';
                    // htdata += '<a  href="' + element.delete + '" class="btn btn-danger"><i class="fa fa-times"></i></a> ';
                    // htdata += '</td>';
                    htdata += '</tr>';
                });
                $('#table tbody').html(htdata);
            }
            else {
                $('#table tbody').html('<tr><td colspan="6" class="text-center">' + response.message + '</td></tr>');
            }
        }
    });
}
$(document).on("submit", ".ajax_post_form12", function (arg) {
    arg.preventDefault();
    // start_process();
    var action = $(this).attr("action");
    var submitdata = $(this).serialize();
    var refid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: action,
        data: submitdata,
        dataType: "JSON",
        success: function (response) {
            getActivityList();
            $('#create-activity-cancel').click();
        }
    });
    //alert();
});