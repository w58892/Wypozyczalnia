/*
fetch('login.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    //body: 'caravan',
    //dataType:'json',
})
.then((resp) => {
    console.log(resp);
    return resp;
})
.then((response) => {
    console.log(response);


})
*/
document.getElementById("btn_loguj").addEventListener("click", 
            function(){

                email = document.getElementById("email").value;
                password = document.getElementById("password").value;
            
               // console.log(email);

               // user = new User();
                //user.login(email, password);
              //  user.register('lol@gmail.com', 'a1s2d3f4', 'a1s2d3f4');
                //user.logout();
                login2(email, password);
            }); 

            document.getElementById("btn_reg").addEventListener("click", 
            function(){

                email = document.getElementById("emailReg").value;
                password = document.getElementById("passwordReg").value;
                password2 = document.getElementById("passwordReg2").value;

            
               // console.log(email);

               // user = new User();
                //user.login(email, password);
              //  user.register('lol@gmail.com', 'a1s2d3f4', 'a1s2d3f4');
                //user.logout();
                register2(email, password,password2);
            }); 


          ///  document.getElementById("logout").addEventListener("click", 
          //  function(){

                //console.log(email);

               // user = new User();

               // user.logout();

          //  }); 


///////////////LOGIN/////////////
function logged(logged, path) {
    div = document.getElementById('menu');
    btn = document.createElement("input");
    btn.setAttribute('class', 'menu');
    btn.setAttribute('id', 'log');

    if (logged == "true") {
        btn.setAttribute('onclick', 'logout("' + path + '")');
        btn.value = "Wyloguj";
        btn.type = "button";


        div = document.getElementById('menu');
        change = document.createElement("input");
        change.setAttribute('class', 'menu');
        change.setAttribute('id', 'changepassword');
        change.setAttribute('onclick', 'changepassword("' + path + '")');
        change.value = "Zmień hasło";
        change.type = "button";
        div.appendChild(change);
    } else {
        btn.setAttribute('onclick', 'login("' + path + '")');
        btn.value = "Zaloguj";
        btn.type = "button";
    }
    div.appendChild(btn);
}


function login(path) {
    document.getElementById("href").innerHTML = "Strona główna";
    main = document.getElementById("main");
    main.innerHTML = "";
    section = document.createElement("section");
    section.setAttribute('class', 'login');
    main.appendChild(section);
    h1 = document.createElement("h1");
    h1.innerHTML = 'Logowanie';
    section.appendChild(h1);

    labelEmail = document.createElement('label');
    labelEmail.setAttribute('id', 'labelEmail');
    section.appendChild(labelEmail);
    email = document.createElement('input');
    email.setAttribute('type', 'text');
    email.setAttribute('id', 'email');
    email.setAttribute('placeholder', 'Email');
    labelEmail.appendChild(email);
    errorEmail = document.createElement('div');
    errorEmail.setAttribute('id', 'errorEmail');
    labelEmail.appendChild(errorEmail);

    labelPassword = document.createElement('label');
    labelPassword.setAttribute('id', 'labelPassword');
    section.appendChild(labelPassword);
    password = document.createElement('input');
    password.setAttribute('type', 'password');
    password.setAttribute('id', 'password');
    password.setAttribute('placeholder', 'Hasło');
    labelPassword.appendChild(password);
    errorPassword = document.createElement('div');
    errorPassword.setAttribute('id', 'errorPassword');
    labelPassword.appendChild(errorPassword);

    login = document.createElement('input');
    login.setAttribute('type', 'button');
    login.setAttribute('class', 'send');
    login.setAttribute('value', 'Zaloguj');
    login.setAttribute('onClick', 'login2("' + path + '")');
    section.appendChild(login);

    reg = document.createElement('input');
    reg.setAttribute('type', 'button');
    reg.setAttribute('value', 'Utwórz konto');
    reg.setAttribute('class', 'btnreg');
    reg.setAttribute('onClick', 'register("' + path + '")');
    section.appendChild(reg);

    anchor = document.getElementById("log");
    anchor.parentNode.removeChild(anchor)

}


function login2() {
    email = document.getElementById("email").value;
    password = document.getElementById("password").value;

    fetch('login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'login&email=' + email + '&password=' + password
    })
        .then((resp) => {
            //console.log(resp);
            return resp.json();
        })
        .then((response) => {
            //console.log(response);
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

                            //window.location.reload(false);


        })


}

function logout(path) {

    fetch(path + 'logout.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'logout=true'
    })
        .then(() => {
            window.location.reload(false);
        });

}

//////////////////////////////////REGISTER//////////////////////////// 
function register(path) {
    main = document.getElementById("main");
    main.innerHTML = "";
    section = document.createElement("section");
    section.setAttribute('class', 'login');
    main.appendChild(section);
    h1 = document.createElement("h1");
    h1.innerHTML = 'Rejestracja';
    section.appendChild(h1);

    labelEmail = document.createElement('label');
    labelEmail.setAttribute('id', 'labelEmail');
    section.appendChild(labelEmail);
    email = document.createElement('input');
    email.setAttribute('type', 'text');
    email.setAttribute('id', 'email');
    email.setAttribute('placeholder', 'Email');
    section.appendChild(email);
    labelEmail.appendChild(email);
    errorEmail = document.createElement('div');
    errorEmail.setAttribute('id', 'errorEmail');
    labelEmail.appendChild(errorEmail);

    labelPassword = document.createElement('label');
    labelPassword.setAttribute('id', 'labelPassword');
    section.appendChild(labelPassword);
    password = document.createElement('input');
    password.setAttribute('type', 'password');
    password.setAttribute('id', 'password');
    password.setAttribute('placeholder', 'Hasło');
    section.appendChild(password);
    labelPassword.appendChild(password);
    errorPassword = document.createElement('div');
    errorPassword.setAttribute('id', 'errorPassword');
    labelPassword.appendChild(errorPassword);

    labelPassword2 = document.createElement('label');
    labelPassword2.setAttribute('id', 'labelPassword2');
    section.appendChild(labelPassword2);
    password2 = document.createElement('input');
    password2.setAttribute('type', 'password');
    password2.setAttribute('id', 'password2');
    password2.setAttribute('placeholder', 'Powtórz hasło');
    section.appendChild(password2);
    labelPassword2.appendChild(password2);
    errorPassword2 = document.createElement('div');
    errorPassword2.setAttribute('id', 'errorPassword2');
    labelPassword2.appendChild(errorPassword2);

    reg = document.createElement('input');
    reg.setAttribute('type', 'button');
    reg.setAttribute('class', 'send');
    reg.setAttribute('value', 'Utwórz konto');
    reg.setAttribute('onClick', 'register2("' + path + '")');
    section.appendChild(reg);


}

function register2(email,password,password2) {

    //email = document.getElementById("email").value;
   // password = document.getElementById("password").value;
  //  password2 = document.getElementById("password2").value;
//
    fetch('login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'email=' + email + '&password=' + password + '&password2=' + password2
    })
        .then((resp) => {
            console.log(resp);

            return resp.json();
            
        })
        .then((response) => {
            console.log(response);
            errorEmail = document.getElementById("errorEmailReg");
            errorEmail.innerHTML = '';
            errorPassword = document.getElementById("errorPasswordReg");
            errorPassword.innerHTML = "";
            errorPassword2 = document.getElementById("errorPasswordReg2");
            errorPassword2.innerHTML = "";

            if (response.email == 'empty')
                errorEmail.innerHTML = ('Pole nie może być puste');

            if (response.email == 'exist')
                errorEmail.innerHTML = ('Taki użytkownik już istnieje');

            if (response.email == 'wrong')
                errorEmail.innerHTML = ('To nie jest prawidłowy adres email');

            if (response.password == 'empty')
                errorPassword.innerHTML = ('Pole nie może być puste');

            if (response.password == 'short')
                errorPassword.innerHTML = ('Hasło musi zawierać conajmniej 8 znaków');

            if (response.password2 == 'empty')
                errorPassword2.innerHTML = ('Pole nie może być puste');

            if (response.passwords == 'wrong')
                errorPassword.innerHTML = ('Hasła muszą być takie same');

            if (response.success == 'true')
            location.href="index.php";
            //console.log(response);

        })
}

////////////////CHANGE PASSWORD///////////////////
function changepassword(path) {
    document.getElementById("href").innerHTML = "Strona główna";
    main = document.getElementById("main");
    main.innerHTML = "";
    section = document.createElement("section");
    section.setAttribute('class', 'login');
    main.appendChild(section);
    h1 = document.createElement("h1");
    h1.innerHTML = 'Zmień hasło';
    section.appendChild(h1);

    labelOldPassword = document.createElement('label');
    labelOldPassword.setAttribute('id', 'labelOldPassword');
    section.appendChild(labelOldPassword);
    OldPassword = document.createElement('input');
    OldPassword.setAttribute('type', 'password');
    OldPassword.setAttribute('id', 'OldPassword');
    OldPassword.setAttribute('placeholder', 'Stare Hasło');
    section.appendChild(OldPassword);
    labelOldPassword.appendChild(OldPassword);
    errorOldPassword = document.createElement('div');
    errorOldPassword.setAttribute('id', 'errorOldPassword');
    labelOldPassword.appendChild(errorOldPassword);

    labelNewPassword = document.createElement('label');
    labelNewPassword.setAttribute('id', 'labelNewPassword');
    section.appendChild(labelNewPassword);
    Newpassword = document.createElement('input');
    Newpassword.setAttribute('type', 'password');
    Newpassword.setAttribute('id', 'Newpassword');
    Newpassword.setAttribute('placeholder', 'Nowe hasło');
    section.appendChild(Newpassword);
    labelNewPassword.appendChild(Newpassword);
    errorNewPassword = document.createElement('div');
    errorNewPassword.setAttribute('id', 'errorNewPassword');
    labelNewPassword.appendChild(errorNewPassword);

    labelNewPassword2 = document.createElement('label');
    labelNewPassword2.setAttribute('id', 'labelNewPassword2');
    section.appendChild(labelNewPassword2);
    Newpassword2 = document.createElement('input');
    Newpassword2.setAttribute('type', 'password');
    Newpassword2.setAttribute('id', 'Newpassword2');
    Newpassword2.setAttribute('placeholder', 'Powtórz nowe hasło');
    section.appendChild(Newpassword2);
    labelNewPassword2.appendChild(Newpassword2);
    errorNewPassword2 = document.createElement('div');
    errorNewPassword2.setAttribute('id', 'errorNewPassword');
    labelNewPassword2.appendChild(errorNewPassword2);

    chg = document.createElement('input');
    chg.setAttribute('type', 'button');
    chg.setAttribute('class', 'send');
    chg.setAttribute('value', 'Zmień hasło');
    chg.setAttribute('onClick', 'changepassword2("' + path + '")');
    section.appendChild(chg);
}

function changepassword2(path) {

    OldPassword = document.getElementById("OldPassword").value;
    Newpassword = document.getElementById("Newpassword").value;
    Newpassword2 = document.getElementById("Newpassword2").value;

    fetch(path + 'changepassword.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'OldPassword=' + OldPassword + '&Newpassword=' + Newpassword + '&Newpassword2=' + Newpassword2
    })
        .then((resp) => {
            window.location.reload(false);
            return resp.json();
        })
}

function go() {
    location.href = 'admin/adminpanel.php';
}