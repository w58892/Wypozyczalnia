document.getElementById("btn_loguj").addEventListener("click", 
    function(){
        email = document.getElementById("email").value;
        password = document.getElementById("password").value;
        login(email, password);
    }
); 

document.getElementById("btn_reg").addEventListener("click", 
    function(){
        email = document.getElementById("emailReg").value;
        password = document.getElementById("passwordReg").value;
        password2 = document.getElementById("passwordReg2").value;
        register(email, password,password2);
    }
); 

function login() {
    email = document.getElementById("email").value;
    password = document.getElementById("password").value;

    fetch('login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'login&email=' + email + '&password=' + password
    })
        .then((resp) => {
            return resp.json();
        })
        .then((response) => {
            errorPassword = document.getElementById("errorPassword");
            errorPassword.innerHTML = "";
            errorEmail = document.getElementById("errorEmail");
            errorEmail.innerHTML = '';

            if (response.email == 'empty')
                errorEmail.innerHTML = ('Pole nie może być puste');

            if (response.email == 'notEmail')
                errorEmail.innerHTML = ('To nie jest prawidłowy adres email');

            if (response.email == 'wrong')
                errorEmail.innerHTML = ('Taki użytkownik nie istnieje');

            if (response.password == 'empty')
                errorPassword.innerHTML = ('Pole nie może być puste');

            if (response.password == 'wrong')
                errorPassword.innerHTML = ('Błędne hasło');

            if (response.success == 'true')
                location.href="index.php";
        }
    )
}


function register(email,password,password2) {

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

        }
    )
}
