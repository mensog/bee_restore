/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//Bootstrap
require('./bootstrap');

//App
require('./Product/add-to-cart');
require('./Favorites/add-to-favorites');
require('./Product/change-cart');
require('./Registration/registration');
require('./Main/toggle-map')
require('./Main/swiper')
require('./Delivery/delivery')
require('./geolocation')
require('./CourierCalculate/calculate')
require('./ProductsList/productsList')

window.utils = require('./utils')

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

export const clean = obj => {
    Object.keys(obj).forEach(key => (obj[key] == null || undefined) && delete obj[key]);
    return obj
};

jQuery($ => {

    $('#showComments').on('click', function () {
        $(this).addClass('d-none')

        $('.comments-list .comment').removeClass('d-none')
    })

    const street = window.utils.storage('beeclub-street')
    if (street) {
        document.getElementById('curPosition').textContent = street
    }

    $('[data-toggle="tooltip"]').tooltip()

    const storeDropdown = $('#navbarDropdown')

    $('.dropdown-empty ').on('click', function () {
        storeDropdown.css({
            borderColor: '#fdd900',
            boxShadow: '0px 1px 3px rgba(253, 217, 0, 1)'
        })
    })

    storeDropdown.on('click', function () {
        storeDropdown.css({
            borderColor: '#E3E3E3',
            boxShadow: 'none'
        })
    })
})
