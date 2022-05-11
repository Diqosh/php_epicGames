let burger = document.getElementsByClassName("header__burger")[0],
    menu = document.getElementsByClassName("leftNav_menu")[0],
    body = document.getElementsByTagName('body')[0],


    dev_menu_btn = document.getElementsByClassName("developer-login__button")[0],
    dev_menu = document.getElementsByClassName("developer-login__wrapper")[0],
    activate = function (...args) {
        args.forEach(
            elem =>{
                elem.classList.toggle("active");
            }
        )

        body.classList.toggle("lock");

    }



burger.addEventListener('click', function (){
    activate(burger, menu)
} );
// dev_menu_btn.addEventListener('click', function (){
//     activate(dev_menu)
// } );
// console.log(dev_menu)