
function disable(){
    errorNumberPlate = document.getElementById("errorNumberPlate");
    errorNumberPlate.innerHTML = "";

    errorProducer= document.getElementById("errorProducer");
    errorProducer.innerHTML = "";

    errorModel= document.getElementById("errorModel");
    errorModel.innerHTML = "";

    errorPrice= document.getElementById("errorPrice");
    errorPrice.innerHTML = "";

    errorWeight= document.getElementById("errorWeight");
    errorWeight.innerHTML = "";

    errorLength= document.getElementById("errorLength");
    errorLength.innerHTML = "";

    errorLengthInside= document.getElementById("errorLengthInside");
    errorLengthInside.innerHTML = "";

    errorWidth= document.getElementById("errorWidth");
    errorWidth.innerHTML = "";

    errorWidthInside= document.getElementById("errorWidthInside");
    errorWidthInside.innerHTML = "";

    errorPeople= document.getElementById("errorPeople");
    errorPeople.innerHTML = "";

    errorWater= document.getElementById("errorWater");
    errorWater.innerHTML = "";
}


list = document.getElementById("caravan-list");
list.addEventListener("change",  function() {

    disable();
    numberPlate = document.getElementById("numberPlate");
    producer = document.getElementById("producer");
    model = document.getElementById("model");
    price = document.getElementById("price");
    weight = document.getElementById("weight");
    length = document.getElementById("length");
    lengthInside = document.getElementById("lengthInside");
    width = document.getElementById("width");
    widthInside = document.getElementById("widthInside");
    people = document.getElementById("people");
    water = document.getElementById("water");
    hotWater = document.getElementById("hotWater");
    shower = document.getElementById("shower");
    fridge = document.getElementById("fridge");
    file = document.getElementById("fileLabel");
    divfile = document.getElementById("divFile");
    checkbox = document.getElementById("checkbox");
    if(list.value == "new")
    {
        numberPlate.style.display = "none";
        producer.style.display = "block";
        model.style.display = "block";
        price.style.display = "block";
        weight.style.display = "block";
        length.style.display = "block";
        lengthInside.style.display = "block";
        width.style.display = "block";
        widthInside.style.display = "block";
        people.style.display = "block";
        water.style.display = "block";
        checkbox.style.display = "flex";
        file.style.display = "flex";
        divfile.style.display = "flex";

    }else{
        numberPlate.style.display = "block";
        producer.style.display = "none";
        model.style.display = "none";
        price.style.display = "none";
        weight.style.display = "none";
        length.style.display = "none";
        lengthInside.style.display = "none";
        width.style.display = "none";
        widthInside.style.display = "none";
        people.style.display = "none";
        water.style.display = "none";
        checkbox.style.display = "none";
        file.style.display = "none";
        divfile.style.display = "none";

    }
});

document.getElementById('btnAdd').addEventListener("click",function(){

	file=document.getElementById('file').files[0];
	
	form=new FormData(); 
	form.append('file', file); 
    
    numberPlate = document.getElementById("numberPlate").value;
    form.append("numberPlate",numberPlate);
    if(document.getElementById("caravan-list").value=="new")
    {
    form.append("addmodel","add");

    producer = document.getElementById("producer").value;
    form.append("producer",producer);

    model = document.getElementById("model").value;
    form.append("model",model);

    price = document.getElementById("price").value;
    form.append("price",price);

    weight = document.getElementById("weight").value;
    form.append("weight",weight);

    length = document.getElementById("length").value;
    form.append("length",length);

    lengthInside = document.getElementById("lengthInside").value;
    form.append("lengthInside",lengthInside);

    width = document.getElementById("width").value;
    form.append("width",width);

    widthInside = document.getElementById("widthInside").value;
    form.append("widthInside",widthInside);

    people = document.getElementById("people").value;
    form.append("people",people);

    water = document.getElementById("water").value;
    form.append("water",water);

    hotWater = document.getElementById("checkHotWater");
    if (hotWater.checked == true)
        form.append("hotWater",1);
    else
        form.append("hotWater",0);

    shower = document.getElementById("checkShower");
    if (shower.checked == true)
        form.append("shower",1);
    else
        form.append("shower",0);

    fridge = document.getElementById("checkFridge");
    if (fridge.checked == true)
        form.append("fridge",1);
    else
        form.append("fridge",0);

    addModel(form);
    }else{
    form.append("modelID",document.getElementById("caravan-list").value);
    addCaravan(form);
    }

    function addModel(form){
        fetch('upload.php', {
            method: 'POST',
            body:  form
        })
        .then((resp) => {
            return resp.json();
        })
        .then((response) => {
            errorNumberPlate = document.getElementById("errorNumberPlate");
            errorNumberPlate.innerHTML = "";

            errorProducer= document.getElementById("errorProducer");
            errorProducer.innerHTML = "";

            errorModel= document.getElementById("errorModel");
            errorModel.innerHTML = "";

            errorPrice= document.getElementById("errorPrice");
            errorPrice.innerHTML = "";

            errorWeight= document.getElementById("errorWeight");
            errorWeight.innerHTML = "";

            errorLength= document.getElementById("errorLength");
            errorLength.innerHTML = "";

            errorLengthInside= document.getElementById("errorLengthInside");
            errorLengthInside.innerHTML = "";

            errorWidth= document.getElementById("errorWidth");
            errorWidth.innerHTML = "";

            errorWidthInside= document.getElementById("errorWidthInside");
            errorWidthInside.innerHTML = "";

            errorPeople= document.getElementById("errorPeople");
            errorPeople.innerHTML = "";

            errorWater= document.getElementById("errorWater");
            errorWater.innerHTML = "";

            errorFile= document.getElementById("errorFile");
            errorFile.innerHTML = "";


 

                if (response.producer == "empty")
                errorProducer.innerHTML = "pole nie może być puste";

                if (response.model == "empty")
                errorModel.innerHTML = "pole nie może być puste";

                if (response.price == "empty")
                errorPrice.innerHTML = "pole nie może być puste";
                else if(response.price == "notNumber")
                errorPrice.innerHTML = "to nie jest liczba";

                if (response.weight == "empty")
                errorWeight.innerHTML = "pole nie może być puste";
                else if(response.weight == "notNumber")
                errorWeight.innerHTML = "to nie jest liczba";

                if (response.length == "empty")
                errorLength.innerHTML = "pole nie może być puste";
                else if(response.length == "notNumber")
                errorLength.innerHTML = "to nie jest liczba";

                if (response.lengthInside == "empty")
                errorLengthInside.innerHTML = "pole nie może być puste";
                else if(response.lengthInside == "notNumber")
                errorLengthInside.innerHTML = "to nie jest liczba";

                if (response.width == "empty")
                errorWidth.innerHTML = "pole nie może być puste";
                else if(response.width == "notNumber")
                errorWidth.innerHTML = "to nie jest liczba";

                if (response.widthInside == "empty")
                errorWidthInside.innerHTML = "pole nie może być puste";
                else if(response.widthInside == "notNumber")
                errorWidthInside.innerHTML = "to nie jest liczba";

                if (response.people == "empty")
                errorPeople.innerHTML = "pole nie może być puste";
                else if(response.people == "notNumber")
                errorPeople.innerHTML = "to nie jest liczba";

                if (response.water == "empty")
                errorWater.innerHTML = "pole nie może być puste";
                else if(response.water == "notNumber")
                errorWater.innerHTML = "to nie jest liczba";

                if (response.file == "empty")
                errorFile.innerHTML = "brak zdjęcia";
                else if (response.file == "big"){
                    errorFile.innerHTML = "duży rozmiar pliku";
                }
                
                if(response.success == "true")
                alert("Dodano nowy model przyczepy");

        }) 
        .catch(error => {
            console.error(error)
        })
    }

    function addCaravan(form){
        fetch('upload.php', {
            method: 'POST',
            body:  form
        })
        .then((resp) => {
            return resp.json();
        })
        .then((response) => {
            errorNumberPlate = document.getElementById("errorNumberPlate");
            errorNumberPlate.innerHTML = "";

            errorModelID= document.getElementById("errorModelID");
            errorModelID.innerHTML = "";

            if (response.numberPlate == "empty")
            {
                errorNumberPlate.innerHTML = "pole nie może być puste";
            }
            else if(response.numberPlate == "length")
            {
                errorNumberPlate.innerHTML = "numer ma mieć 7 znaków";
            }
            else if (response.caravan == "exist")
            {
               errorNumberPlate.innerHTML = "Taki numer już istnieje";
            }

            if (response.modelID == "empty")
            errorModelID.innerHTML = "Wybierz model";
            
            if(response.success == "true")
            alert("Dodano przyczepę");
        }) 
        .catch(error => {
            console.error(error)
        })
    }
}
);