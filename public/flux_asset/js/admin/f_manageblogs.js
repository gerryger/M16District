/**
 * Created by user on 2016-04-05.
 */
$(document).ready(function(e){
    $('.desc-editor').notebook(function(){
        autoFocus: true
    });
    $('[name="image"]').dropify();
    init();
    $('#btnCancel').click(function(e){
        e.preventDefault();

        $('#txtTitle').val('');
        $('#txtDesc').val('');
        $('input:file').val('');

    });

    //$('.desc-editor').keyup(function(e){
    //    var desc = $(this).text();
    //    $('#txtDesc').val(desc);
    //});

    onClickBtnEdit();
    onClickBtnCancelUpdate();
});

function onClickBtnEdit(){
    $('.btnEdit').click(function(e){
        e.preventDefault();

        var row = $(this).closest('tr');
        var cells = row.find('td');//dapetin text per cell
        var id = cells.eq(0).find('.blog_id').val();//dapetin id per cell

        var title = cells.eq(0).text();
        var desc = cells.eq(1).find('.blog_desc').val();
        var date = cells.eq(2).text();
        var image = cells.eq(3).text();
        var created_by = cells.eq(4).text();

        $('#txtTitle').val(title);
        //$('.desc-editor').html(desc);
        $('#txtDesc').val(desc);
        $('#image').attr('data-default-file', "{{asset('flux_asset/images/blog/"+image+"')}}");
        $('[name="txtId"]').val(id);
        $('#txtDate').val(date);
        $('#txtCreatedby').val(created_by);

        //if add btn and cancel btn is visible
        if($('#btnAddBlog').is(':visible') && $('#btnCancel').is(':visible')){
            //hide add btn and cancel btn
            $('#btnAddBlog').hide();
            $('#btnCancel').hide();

            //show update btn and cancel update btn
            $('#btnUpdateBlog').show(500);
            $('#btnCancelUpdate').show(500);
        }
    });
}

function onClickBtnCancelUpdate(){
    $('#btnCancelUpdate').click(function(e){
        e.preventDefault();

        if($('#btnUpdateBlog').is(':visible') && $(this).is(':visible')){
            $('#btnUpdateBlog').hide();
            $(this).hide();

            $('#btnAddBlog').show(500);
            $('#btnCancel').show(500);
        }

        resetForm();
    });
}

function init(){
    $('#blogsTable').dataTable({
        'pageLength': 5
    });
    $('.date').datetimepicker();
    if($('#btnUpdateBlog').is(':visible')){
        $('#btnUpdateBlog').hide();
    }
    if($('#btnCancelUpdate').is(':visible')){
        $('#btnCancelUpdate').hide();
    }
    resetForm();

    //tinyMCE.init({
    //    selector:'textarea',
    //    plugins: 'image',
    //    menubar: 'insert',
    //    max_width: 700
    //});
}

function resetForm() {
    $('#txtTitle').val('');
    $('#txtDesc').val('');
    $('input:file').val('');
    $('#txtDate').val(getToday());
}

function getToday(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd='0'+dd
    }

    if(mm<10) {
        mm='0'+mm
    }

    today = yyyy+'/'+mm+'/'+dd;

    return today;
}
