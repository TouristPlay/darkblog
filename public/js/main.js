"use strict";


// Бургер меню
$(document).ready(function () {
    $('.header__burger').click(function (event) {
        $('.header__burger, .profile__nav').toggleClass('active');
        $('body').toggleClass('lock');
    })
})

// Функция проверяет, ознакомлен ли с правилами пользователь
function checkRuleCheckbox() {
    // Получаем ссылку на регистрацию
    let registerLink = document.querySelector('.register-link');
    registerLink.classList.toggle('disable');
}

let forum = document.querySelector('.forum');

if (forum !== null) {
    $('#summernote').summernote({
        maxHeight:70,
        height:70,
        placeholder:'Введите данные',
        disableDragAndDrop:true,
    });
}  else {
    $('#summernote').summernote({
        maxHeight:320,
        height:320,
        placeholder:'Введите данные',
        disableDragAndDrop:true,
    });

}


// Сокращаем название товара
let productTitle = document.querySelectorAll('.product__title');

productTitle.forEach((element) => {
    let temp = element['innerText'];

    if (temp.length > 13) {
        let sliced = temp.slice(0, 13);
        sliced += '...';
        element['innerText'] = sliced;
    }
})

// Если товара меньше или равен 5 то делаем круг красным
let productAmount = document.querySelectorAll('.product__amount')

productAmount.forEach( (element) => {
    let amountNumber = element['innerText'];

    if (amountNumber <= 5) {
        element.style.backgroundColor = "rgba(183, 21, 41, 0.6)";
    }
    if (amountNumber == 0) {
        element.style.backgroundColor = "rgba(183, 21, 41, 0.6)";
        element.textContent = 'SoldOut';
    }
})


// Перечеркиваем старую цену
let productInfo = document.querySelectorAll('.product__info');

productInfo.forEach( (element) => {
    let discount = element.querySelector('.product__price-discount'); // Скидочный блок
    let productPrice = element.querySelector('.product__price'); // Цена
    // Если есть скидка
    if (discount != null) {
        productPrice.classList.toggle('discount-price'); // Ставим класс для перечеркивания
        productPrice.style.fontSize = '8px'; // Уменьшаем шрифт старой цене
        discount.style.fontSize = '12px'; // Указываем новый размер шрифта скидке
    }
})

// Укорачиваем текст
let cardDescription = document.querySelectorAll('.card__description');

cardDescription.forEach( (element) => {
    let temp = element['innerText'];

    if (temp.length > 100) {
        let sliced = temp.slice(0, 100);
        sliced += '...';
        element['innerText'] = sliced;
    }
})


// Изменяем активынй таб меню
let footerListItem = document.querySelectorAll('.footer__list-item');

footerListItem.forEach(function(element) {
    element.addEventListener('click', (event) => {
        let tabText = event.currentTarget.classList.toggle('active');
        let menuItem = event.currentTarget.dataset.menuitem;
        localStorage.setItem('active', menuItem);
    })
})

footerListItem.forEach(function(element) {
    let menuItem = element.dataset.menuitem;

    if (localStorage.getItem('active') === menuItem) {
        element.classList.toggle('active');
    }
})




