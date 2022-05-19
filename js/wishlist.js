
"use strict"
const BASE_URL = document.body.dataset.baseurl;
let btns = document.querySelectorAll('.game__remove');
let removeWishlist_btn = document.querySelector('.game__remove')


function add_wishlist(id){
    axios.post(BASE_URL + "/api/basket/add.php",{
        item_id: id
    })
}


// for (let i = 0; i < btns.length; i++) {
//     btns[i].onclick = function (){
//         this.parentElement.parentElement.parentElement.style.display = "none"
//     }
// }
function remove_wishlist(e, id){

    axios.post(BASE_URL + "/api/basket/delete.php",{
        basket_id: id
    }).then(res =>{
        console.log(res.data)
    })
    e.target.parentElement.parentElement.parentElement.parentElement.style.display = "none"

}

