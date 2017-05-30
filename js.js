$('#send').on('click', function () {
    var text = $("#text").val();
    var number = $("#number").val();
    var data_for_send = "text=" + text + "&number=" + number;
    $.ajax({
        type: "POST",
        url: "decoder.php",
        data: data_for_send,
        cache: false,
        success: function (data) {
            $("#crypt").html(data);
        },
        error: function (request) {
            $('#crypt').text('Error ' + request.responseText + ' when sending data.');
        }
    });

});

