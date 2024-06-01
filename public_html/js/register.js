//подписываемся на событие загрузки страницы
window.addEventListener('load',()=>{
    let welcome =
        {
        'checkLogin':false,
        'email' : false,
        'pwd': false,
        'pwdConfirm' : false
        };
    //Если не пройдена вся верификация кнопка отправить на сервер заблокированна
    let btnSub = document.getElementById('btn-sub').disabled = true;

    //Также блокируем повторный ввод пароля 
    document.getElementById('cnfPwd').disabled = true;
    //Определяем див мессадже
    divMessage = document.querySelector('#message');




    //Часть по проверке логина
    //====================================================================================================================//
    let inpName = document.getElementById('inpName')
        inpName.onblur = function(){       
            console.log(inpName.value);
            // Создаём объект класса XMLHttpRequest
            const r = new XMLHttpRequest();
            const url = 'http://localhost:8080/checkLogin.php?name='+inpName.value;
            r.open('GET', url,true);
            //r.send();
            r.onload = () => {
                if (r.status === 200) {
                const data = JSON.parse(r.response);
                console.log(data);
                if (data != 'undifined'){
                    // Тут выводится message который отдал checkLogin
                    if(data === 'Логин свободен'){
                        divMessage.innerHTML = '<p id="mess" style="color:green;" >'+data+'</p>';
                        welcome.checkLogin = true;
                        OnButtonSubmit(welcome);
                        console.log('массив welcome после проверки логина',welcome);
                        clearMessage(5);
                    }else{
                        divMessage.innerHTML = '<p id="mess" style="color:red;" >'+data+'</p>';
                        clearMessage(5);
                    }
                    
                }
                } else {
                console.error("Произошла ошибка");
                }
            };
            r.send();
            //r.setRequestHeader('Content-Type', 'application/x-www-form-url');
            console.log(r);
        }
    //====================================================================================================================//



    //Часть по проверке email
    //====================================================================================================================//
        let inpEmail = document.getElementById('inpEmail');
        // console.log(inpEmail);
        inpEmail.onblur = ()=>{
            if(inpEmail.value.length>0){
                if(isEmailValid(inpEmail.value)){
                    divMessage.innerHTML = '<p id="mess" style="color:green;" >'+'Email валидный'+'</p>';
                    welcome.email = true;
                    OnButtonSubmit(welcome);
                    console.log('массив welcome после проверки логина',welcome);
                    clearMessage(5);
                }else{
                    divMessage.innerHTML = '<p id="mess" style="color:red;" >'+'Email Не валидный'+'</p>';
                    clearMessage(5);
                }
            }else{
                divMessage.innerHTML = '<p id="mess" style="color:red;" >'+'Введите Email'+'</p>';
                clearMessage(5);
            }
        }
    //====================================================================================================================//
    


    //Часть по проверке пароля
    //====================================================================================================================//
        let pwd = document.getElementById('pwd');
        pwd.onblur = ()=>{
            if(isPwdValid(pwd.value)){
                console.log('часть по проверке пароля пароль валидный');
                welcome.pwd = true;
                OnButtonSubmit(welcome);
                //Разблокируем подтверждение пароля
                document.getElementById('cnfPwd').disabled = false;
                divMessage.innerHTML = '<p id="mess" style="color:green;" >'+'Пароль валидный'+'</p>';
                let cnfPwd = document.getElementById('cnfPwd');
                cnfPwd.onblur = function(){
                    if(cnfPwd.value === pwd.value){
                        welcome.pwdConfirm = true;
                        console.log(welcome);
                        OnButtonSubmit(welcome);
                        divMessage.innerHTML = '<p id="mess" style="color:green;" >'+'Пароли совпадают'+'</p>';
                    }else{
                        divMessage.innerHTML = '<p id="mess" style="color:red;" >'+'Пароли НЕ совпадают'+'</p>';  
                    }
                }
            }else{
                console.log('часть по проверке пароля.. пароль НЕ валидный');
                divMessage.innerHTML = '<p id="mess" style="color:red;" >'+'Пароль должен содержать <br> 1. [A-z] <br>2. [0-9]<br>3. спецсимволы'+'</p>';
                clearMessage(5);
            }
        }
        //Подтверждение пароля

    //====================================================================================================================//










    // Очищает вывод через 5 сек
    function clearMessage(s){
        setTimeout(()=>{
            divMessage = document.querySelector('#message');
            divMessage.innerHTML = '<p id="mess" color="red" ></p>';
        },s*1000)
    }
    //включает кнопку отправки когда все поля объекта верификации - true 
    function OnButtonSubmit(obj){
        let enabled = 1;
        for (const prop in obj) {      
            if(obj[prop] === false){
                enabled = 0; 
            }
          }
          console.log('enabled',enabled);
        if(enabled == 1){
            console.log('сюда попали когда enabled 1 и кнопка разблокировалась')
            document.getElementById('btn-sub').disabled = false;
        }
    }
    //Функция проверки валидности email
    function isEmailValid(value) {
        const EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;
        return EMAIL_REGEXP.test(value);
    }

    //Функция проверки пароля
    function isPwdValid(value) {
        const EMAIL_REGEXP = /(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/g;
        return EMAIL_REGEXP.test(value);
    }
})
// оставлю на подсмотреть 
    // по клик убирает div с инфо 
    // form.addEventListener('click',()=>{
    //     divMessage = document.querySelector('#message');
    //     divMessage.innerHTML = '<p id="mess" color="red" ></p>';
    // })
    //console.log(form)


    
    //--------------------------это было для сравнения паролей
        // //ищем форму
    // let form = document.querySelector('form');
    // //подписываемся на событие submit передаем event в анонимную функцию хз для чего пока
    // form.addEventListener('submit',function(e){
    //     //Ищем интпуты с паролями по id
    //     let pwd = document.getElementById('pwd')
    //     let cnfPwd = document.getElementById('cnfPwd')

    //     //сравниваем значение и выводим сообщение
    //     if( pwd.value != cnfPwd.value ){
    //         divMessage = document.querySelector('#message');
    //         divMessage.innerHTML = '<p id="mess" color="red" >Пароли не совпадают</p>';
    //         document.getElementById('btn-sub').disable = true;

    //         clearMessage(5);

    //     } 
    // })
