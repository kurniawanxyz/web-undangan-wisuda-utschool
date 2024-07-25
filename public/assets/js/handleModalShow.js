function changeValueForm(userId, name, hasCheck) {
    if (hasCheck === 'hadir') {
        $('#radioHadir').prop('checked', true);
    } else if (hasCheck === 'tidak_hadir') {
        $('#radioTidakHadir').prop('checked', true);
    }
    $('#substitute').val(name);
    $('#userId').val(userId);

    $('#myModal').modal('show');
}
