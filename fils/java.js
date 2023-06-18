$(document).ready(function () {
    $('#date').on('change', function () {
        var date = $(this).val();
        var id_bateau = $("#id_bateau").val();
        $.ajax({
            type: 'POST',
            url: 'reservation.php',
            data: {
                date: date,
                id_bateau: id_bateau
            },
            dataType: 'json',
            success: function (response) {
                $('#time_sortie').empty();
                $('#time_retour').empty();
                $('#price').empty();
                $('#time_sortie').append('<option value="">Choisir</option>');
                $('#time_retour').append('<option value="">Choisir</option>');

                var newData = response.timesSortie;
                var newDataRetour = response.timesRetour;
               
                var arrayTimes = ['09:30:00', '10:00:00', '10:30:00', '11:00:00', '11:30:00', '12:00:00', '12:30:00', '13:00:00', '13:30:00', '14:00:00', '14:30:00', '15:00:00', '15:30:00', '16:00:00', '16:30:00', '17:00:00', '17:30:00', '18:00:00', '18:30:00', '19:00:00'];
                var arrayTimesRetour = ['09:30:00', '10:00:00', '10:30:00', '11:00:00', '11:30:00', '12:00:00', '12:30:00', '13:00:00', '13:30:00', '14:00:00', '14:30:00', '15:00:00', '15:30:00', '16:00:00', '16:30:00', '17:00:00', '17:30:00', '18:00:00', '18:30:00', '19:00:00'];

                for (var i = 0; i < arrayTimes.length; i++) {
                    var time = arrayTimes[i];
                    var disable = false;
                    for (var j = 0; j < newData.length; j++) {
                        if (time == newData[j] || (time >= newData[j] && time < newDataRetour[j])) {
                            disable = true;
                            break;
                        }
                    }
                    if (disable) {
                        $('#time_sortie').append('<option value="' + time + '" disabled>' + time + '</option>');
                    } else {
                        $('#time_sortie').append($('<option>').val(time).text(time));
                    }
                }

                for (var i = 0; i < arrayTimesRetour.length; i++) {
                    var times = arrayTimesRetour[i];
                    var disable = false;
                    for (var j = 0; j < newDataRetour.length; j++) {
                        if (times === newDataRetour[j] || (times > newData[j] && times < newDataRetour[j])) {
                            disable = true;
                            break;
                        }
                    }
                    if (disable) {
                        $('#time_retour').append('<option value="' + times + '" disabled>' + times + '</option>');
                    } else {
                        $('#time_retour').append($('<option>').val(times).text(times));
                    }
                }
                
                $('#time_sortie').on('change', function () {
                    var selectedSortie = $(this).val();
                    $('#time_retour option').each(function (i) {
                        var retourTime = $(this).val();
                        var disable = retourTime <= selectedSortie || (retourTime >= newData[0] && retourTime <= newDataRetour[newDataRetour.length -1]);
                
                        $(this).prop('disabled', disable);
                    });
                });
                
                
                
                
            }
        });
    });
});




















































