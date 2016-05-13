/**
 * Created by user on 2016-03-03.
 */
$(document).ready(function(){

    var editEventTable = $('#editEventsTable').DataTable();

    $('body').on('click', '#editEventsTable tbody tr td button', function(){
        var row = $(this).closest('tr');
        var cells = row.find('td');//dapetin text per cell
        var id = cells.eq(0).find('.event_id');//dapetin id per cell
        //alert(cells.eq(0).text()+", ID : "+id.val());

        var eventID = id;
        var eventName = cells.eq(0).text();
        var eventPage = cells.eq(1).text();
        var eventPlace = cells.eq( 2).text();
        var eventStart = cells.eq(3).text();
        var eventEnd = cells.eq(4).text();
        var eventImage = cells.eq(5).text();
        var eventDesc = cells.eq(6).text();

        //alert(eventID.val());

        $('#eventID').val(eventID.val());
        if(eventPage.match('^l') || eventPage.match('^L')){ //Landing Page
            $('#page').val('l');
        }
        if(eventPage.match('^s') || eventPage.match('^S')){ //Subhaus
            $('#page').val('s');
        }
        if(eventPage.match('^p') || eventPage.match('^P')){ //Pitstop
            $('#page').val('p');
        }
        if(eventPage.match('^m') || eventPage.match('^M')){ //Monroe
            $('#page').val('m');
        }
        if(eventPage.match('^f') || eventPage.match('^F')){ //Flux
            $('#page').val('f');
        }
        $('#txtEventName').val(eventName);
        $('#txtEventPlace').val(eventPlace);
        $('#txtStartDate').val(eventStart);
        $('#txtEndDate').val(eventEnd);
        $('#txtEventImage').val(eventImage);
        $('#txtDescription').val(eventDesc);



    });


    //$('#editEventForm').bootstrapValidator({
    //    fields:{
    //        txtEventName:{
    //            validators:{
    //                noEmpty:{
    //                    message: "Event Name Required!"
    //                }
    //            }
    //        }
    //    }
    //
    //});
});

