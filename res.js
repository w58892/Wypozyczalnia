document.getElementById("addReservation").addEventListener("click", 
    function(){
        bgn = new Date(document.getElementById("begin").value);
        en = new Date(document.getElementById("end").value);

        beginMonth = bgn.getMonth()+1;
        if(beginMonth<10)
            beginMonth= '0'+beginMonth;

        beginDay = bgn.getDate();
        if(beginDay<10)
            beginDay= '0'+beginDay;

        endMonth = en.getMonth()+1;
        if(endMonth<10)
            endMonth= '0'+endMonth;

        endDay = en.getDate();
        if(endDay<10)
            endDay= '0'+endDay;

        begin = bgn.getUTCFullYear()+'-'+beginMonth+'-'+beginDay;
        end = en.getUTCFullYear()+'-'+endMonth+'-'+endDay;

        producer="Hobby";
        model="lolol";

        fetch('reser.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'producer=' + producer + '&model=' + model + '&begin=' + begin + '&end=' + end
        })
        .then((resp) => {
            console.log(resp);
            return resp.json();
        })
        .then((response) => {
            console.log(response);
            errorPassword = document.getElementById("errorPassword");
            errorPassword.innerHTML = "";
            errorEmail = document.getElementById("errorEmail");
            errorEmail.innerHTML = '';

            if (response.email == 'empty')
                errorEmail.innerHTML = ('Pole nie może być puste');

            if (response.email == 'wrong')
                errorEmail.innerHTML = ('Taki użytkownik nie istnieje');

            if (response.password == 'empty')
                errorPassword.innerHTML = ('Pole nie może być puste');

            if (response.password == 'wrong')
                errorPassword.innerHTML = ('Błędne hasło');

            if (response.success == 'true')
                location.href="index.php";
        })
    }
); 
