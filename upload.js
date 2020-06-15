function wyslijPlik() {
	var plik=document.getElementById("plik").files[0];
	
	var formularz=new FormData(); //tworzymy nowy formularz do wysłania
	formularz.append("plik", plik); //dodajemy do formularza pole z naszym plikiem
    
    numberPlate = document.getElementById("numberPlate").value;
    formularz.append("numberPlate",numberPlate);

    producer = document.getElementById("producer").value;
    formularz.append("producer",producer);

    model = document.getElementById("model").value;
    formularz.append("model",model);

    price = document.getElementById("price").value;
    formularz.append("price",price);

    weight = document.getElementById("weight").value;
    formularz.append("weight",weight);

    length = document.getElementById("length").value;
    formularz.append("length",length);

    lengthInside = document.getElementById("lengthInside").value;
    formularz.append("lengthInside",lengthInside);

    width = document.getElementById("width").value;
    formularz.append("width",width);

    widthInside = document.getElementById("widthInside").value;
    formularz.append("widthInside",widthInside);

    people = document.getElementById("people").value;
    formularz.append("people",people);

    water = document.getElementById("water").value;
    formularz.append("water",water);

    hotWater = document.getElementById("hotWater").value;
    formularz.append("hotWater",hotWater);

    shower = document.getElementById("shower").value;
    formularz.append("shower",shower);

    fridge = document.getElementById("fridge").value;
    formularz.append("fridge",fridge);


    fetch('upload.php', {
        method: 'POST',
      //  headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body:  formularz
    })
    .then((resp) => {
        console.log(resp);
        return resp.json();
    })
    .then((response) => {
        console.log(response);
    }) 
    .catch(error => {
        console.error(error)
    })
}
 