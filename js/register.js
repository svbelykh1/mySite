//подписываемся на событие загрузки страницы
window.addEventListener('load',()=>{
    //ищем форму
    let form = document.querySelector('form');
    //подписываемся на событие submit передаем event в анонимную функцию хз для чего пока
    form.addEventListener('submit',function(e){
        //Ищем интпуты с паролями по id
        let pwd = document.getElementById('pwd')
        let cnfPwd = document.getElementById('cnfPwd')

        //сравниваем значение и выводим сообщение
        if( pwd.value != cnfPwd.value ){
            divMessage = document.querySelector('#message');
            divMessage.innerHTML = '<p id="mess" color="red" >Пароли не совпадают</p>';
        } 
    })

    form.addEventListener('click',()=>{
        divMessage = document.querySelector('#message');
        divMessage.innerHTML = '<p id="mess" color="red" ></p>';
    })
    //console.log(form)
})
