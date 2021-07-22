class ColorStrategyManager
    {        
        constructor()
        {
            this._Strategy = null;
        }
        set strategy(strategy)
        {
            this._strategy=strategy;
        }
        get strategy()
        {
            return this._strategy;
        }
        action()
        {
            this._strategy.action();
        }
    }

    class StrategyDark
    {
        action(){
            document.body.style.color="White";
            document.body.style.backgroundColor="Black";
            document.getElementById("header").style.backgroundColor="Black";
            var text = document.getElementsByClassName("color");
            for(var i=0;i<text.length;i++){
                text[i].style.color="White";
            }
            document.getElementById("colorBTN").className = "dark";
            var img = document.getElementById("logo");
            img.src = "images/logoWhite.png";
            document.getElementById("colorBTN").value="Jasny";
            sendColor("Ciemny");
        }
    }

    class StrategyLight
    {
        action(){
            document.body.style.color="Black";
            document.body.style.backgroundColor="White";
            var text = document.getElementsByClassName("color");
            for(var i=0;i<text.length;i++){
                text[i].style.color="Black";
            }
            document.getElementById("header").style.backgroundColor="White";
            document.getElementById("colorBTN").className = "light";
            var img = document.getElementById("logo");
            img.src = "images/logoBlack.png";
            document.getElementById("colorBTN").value="Ciemny";
            sendColor("Jasny");
        }
    }


function color(color){
    const colorStrategyManager = new ColorStrategyManager();
    const strategyDark = new StrategyDark();
    const strategyLight = new StrategyLight();

    if(color =="Ciemny")
    {
        colorStrategyManager.strategy = strategyDark;
        colorStrategyManager.action();
    }else{
        colorStrategyManager.strategy = strategyLight;
        colorStrategyManager.action();
    }
}
    //var colorButton = document.getElementById("color");
    document.getElementById("colorBTN").addEventListener("click", 
        function(){
            color(document.getElementById("colorBTN").value);
        }
); 



function sendColor(color) {

    fetch('color.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'color=' + color
    })

    
}

function getColor() {

    fetch('color.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'color=get'

    })
        .then((resp) => {
            return resp.json();
        })
        .then((response) => {

            //console.log(response.color);
            color(response.color);
        }
    )
}

getColor()