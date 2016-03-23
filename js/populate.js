function getState(val) {
    $.ajax({
        type: "POST",
        url: "get_state.php",
        data: 'team_id=' + val,
        success: function (data) {
            $("#StateList").html(data);
        }
    });
}

function loadTable(val2, val3) {
    var vals = new Array();
    vals[0] = val2;
    vals[1] = val3;

    var jsonString = JSON.stringify(vals);
    $.ajax({
        type: "POST",
        url: "load_table.php",
        data: {data: jsonString},
        success: function (data) {

            $("#tableBody").html(data);
        }
    });
}
