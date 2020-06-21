
list = document.getElementById("caravan-list");
list.addEventListener("change",  function() {
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
    file = document.getElementById("file");

    if(list.value == "new")
    {
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
        hotWater.style.display = "block";
        shower.style.display = "block";
        fridge.style.display = "block";
        file.style.display = "block";
    }else{
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
        hotWater.style.display = "none";
        shower.style.display = "none";
        fridge.style.display = "none";
        file.style.display = "none";
    }
});


function add() {
	file=document.getElementById('file').files[0];
	
	form=new FormData(); //tworzymy nowy form do wysłania
	form.append('file', file); //dodajemy do forma pole z naszym fileiem
    //console.log(document.getElementById("caravan-list").value);

    
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

    hotWater = document.getElementById("hotWater").value;
    form.append("hotWater",hotWater);

    shower = document.getElementById("shower").value;
    form.append("shower",shower);

    fridge = document.getElementById("fridge").value;
    form.append("fridge",fridge);
    }else{
    form.append("modelID",document.getElementById("caravan-list").value);
    }
    //numberPlate.classList.add("dis-none");


    fetch('upload.php', {
        method: 'POST',
      //  headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body:  form
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
 