//подписываемся на событие загрузки страницы
window.addEventListener('load',()=>{
    //ищем форму
    let form = document.querySelector('form');
    //подписываемся на событие submit передаем event в анонимную функцию хз для чего пока
    form.addEventListener('submit',function(e){
        //Ищем интпуты с паролями по id
        let pwd = document.getElementById('pwd')
        let cnfPwd = document.getElementById('cnfPwd')

        //сравниваем значение и выводим alert
        if( pwd.value != cnfPwd.value ){
            alert("пароли не совпадают")
        }
    })
    //console.log(form)
})
