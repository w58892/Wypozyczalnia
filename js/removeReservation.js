function remove(id){
    fetch('reser.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'reservationID=' + id
    })
    .then((resp) => {
        return resp.json();
    })
    .then((response) => {

        if (response.success == 'true')
            alert("Usunięto rezerwację");
            location.reload();
    })
}