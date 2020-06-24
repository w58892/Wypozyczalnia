url = new URL(window.location.href);
modelID = url.searchParams.get("id");

document.getElementById("addReservation").addEventListener("click", 
    function(){

        document.getElementById("errorBegin").innerHTML="";
        document.getElementById("errorEnd").innerHTML="";

        if(document.getElementById("begin").value =="")
        document.getElementById("errorBegin").innerHTML="błędna data";
        else if(document.getElementById("end").value =="")
        document.getElementById("errorEnd").innerHTML="błędna data";
        else{
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


        fetch('reser.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'modelID=' + modelID + '&begin=' + begin + '&end=' + end
        })
        .then((resp) => {
            return resp.json();
        })
        .then((response) => {

            if (response.date == 'wrong')
            document.getElementById("errorBegin").innerHTML="błędna data";

            if (response.success == 'true')
                alert("Dodano rezerwację");

            if (response.login == 'false')
                window.location="log.php";

            if (response.available == 'false')
                alert("Przyczepa niedostępna w wyznaczonym terminie");
        })
    }
}
); 
