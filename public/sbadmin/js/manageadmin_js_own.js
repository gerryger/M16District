/**
 * Created by user on 2016-03-07.
 */
$(document).ready(function(){
    init();

    onClickBtnDeleteAdmin();

    onClickBtnAddAdmin();

    onClickBtnEditAdmin();

    onClickBtnCancel();

    onClickBtnUpdateAdmin();

    //$('#addAdminForm').bootstrapValidator({
    //    fields:{
    //        txtAdminName:
    //        {
    //            validators:
    //            {
    //                noEmpty:
    //                {
    //                    message: 'Admin Name Required!'
    //                },
    //                stringLength:
    //                {
    //                    max: 25,
    //                    min: 5,
    //                    message: 'Admin Name must be 5-25 characters!'
    //                }
    //            }
    //        }
    //    }
    //});

});

function init() {
    var adminTable = $('#adminTable').dataTable({
        'pageLength': 5
    });

    $('#txtAdminName').val('');
    $('#txtAdminEmail').val('');
    $('#txtAdminPassword').val('');

    if ($('#btnUpdateAdmin').is(':visible') && $('#btnCancel').is(':visible')) {
        $('#btnUpdateAdmin').hide();
        $('#btnCancel').hide();
    }
}



function onClickBtnAddAdmin(){
    $('#btnAddAdmin').click(function(e){
        e.preventDefault();

        var emailRegex = '.+\@.+\..+';

        //$('#addAdminForm').bootstrapValidator('validate');
            var name = $('#txtAdminName').val();
            var email = $('#txtAdminEmail').val();
            var pass = $('#txtAdminPassword').val();
            var page = $('#txtPage').val();
            var _token = $('input[name=_token]').val();

            if(name == ''){
                alert('Admin name required!');
                //$('#grpAdminName').addClass('has-error');
            } else if(email == '' ){
                alert('Email required!');
                //$('#grpAdminEmail').addClass('has-error');
            }else if(!email.match(emailRegex)){
                alert('Invalid email format!');
                //$('#grpAdminEmail').addClass('has-error');

            }else if(pass == ''){
                alert('Pasword required!');
                //$('#grpAdminPass').addClass('has-error');
            }else if(page == ''){
                alert('Page required!');
                //$('#grpAdminPage').addClass('has-error');
            }
            else {

                $.ajax({
                    type: 'POST',
                    url: 'doaddadmin',
                    dataType: 'json',
                    data: {name: name, email: email, pass: pass, page: page, _token: _token},
                    success: function (res) {
                        if (res) {
                            window.location.reload();
                        } else {
                            alert(res.msg);
                        }
                    }
                });
            }
    });
}

function onClickBtnDeleteAdmin(){
    $('.btnDelete').click(function(e){
        e.preventDefault();

        var row = $(this).closest('tr');
        var cells = row.find('td');//dapetin text per cell
        var id = cells.eq(0).find('.admin_id').val();//dapetin id per cell

        var admin_id = id;
        var _token = $('input[name=_token]').val();

        $.ajax({
            type: 'POST',
            url: 'dodeleteadmin',
            dataType: 'json',
            data: {admin_id: admin_id, _token: _token},
            success: function(res){
                if(res){
                    window.location.reload();
                } else {
                    alert(res.msg);
                }
            }
        });
    });
}

function onClickBtnEditAdmin(){
    $('.btnEdit').click(function(e){
        e.preventDefault();

        var row = $(this).closest('tr');
        var cells = row.find('td');//dapetin text per cell
        var id = cells.eq(0).find('.admin_id').val();//dapetin id per cell

        var admin_id = id;
        var admin_name = cells.eq(0).text();
        var admin_email = cells.eq(1).text();
        var admin_password = cells.eq(2).text();

        $('#txtAdminID_hidden').val(admin_id);
        $('#txtAdminName').val(admin_name);
        $('#txtAdminEmail').val(admin_email);
        $('#txtAdminPassword').val(admin_password);

        if($('#btnAddAdmin').is(':visible')) {
            $('#btnAddAdmin').hide();

            $('#btnUpdateAdmin').show(500);
            $('#btnCancel').show(500);
        }
    });
}

function onClickBtnCancel(){
    $('#btnCancel').click(function(e) {
        e.preventDefault();

        if ($('#btnUpdateAdmin').is(':visible') && $('#btnCancel').is(':visible')) {
            $('#btnUpdateAdmin').hide();
            $('#btnCancel').hide();

            $('#btnAddAdmin').show(500);
        }
        clearAll();
    });
}

function onClickBtnUpdateAdmin(){
    $('#btnUpdateAdmin').click(function(e){
        e.preventDefault();

        var id = $('#txtAdminID_hidden').val();
        var name = $('#txtAdminName').val();
        var email = $('#txtAdminEmail').val();
        var pass = $('#txtAdminPassword').val();
        var _token = $('input[name=_token]').val();

        $.ajax({
            type: 'POST',
            url: 'doeditadmin',
            dataType: 'json',
            data: {id: id, name: name, email: email, pass: pass, _token: _token},
            success: function(res){
                if(res){
                    window.location.reload();
                }else{
                    alert(res.msg);
                }
            }
        });
    });
}




function clearAll(){
    $('#txtAdminID_hidden').val('');
    $('#txtAdminName').val('');
    $('#txtAdminEmail').val('');
    $('#txtAdminPassword').val('');
}




