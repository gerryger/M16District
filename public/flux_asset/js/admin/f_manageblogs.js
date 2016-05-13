/**
 * Created by user on 2016-04-05.
 */
$(document).ready(function(e){
    init();
    $('#btnCancel').click(function(e){
        e.preventDefault();

        $('#txtTitle').val('');
        $('#txtDesc').val('');
        $('input:file').val('');

    });
});

function init(){
    $('#blogsTable').dataTable({
        'pageLength': 5
    });
    $('.date').datetimepicker();
    if($('#btnUpdateBlog').is(':visible')){
        $('#btnUpdateBlog').hide();
    }
    resetForm();

    tinyMCE.init({
        selector:'textarea',
        plugins: 'image',
        menubar: 'insert',
        max_width: 700
    });
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
