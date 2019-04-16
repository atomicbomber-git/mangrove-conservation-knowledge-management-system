
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Load datatables
require('datatables.net-bs4')

// Load TinyMCE WYSIWYG Editor
require('tinymce');

// TinyMCE File Picker Callback
window.file_picker_callback = require('./file_picker_callback')

// Load sweetalert
window.swal = require('sweetalert')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Vue = require('vue');

Vue.component('article-create', require('./components/article/Create.vue'));
Vue.component('user-article-create', require('./components/user-article/Create.vue'));
Vue.component('user-article-edit', require('./components/user-article/Edit.vue'));
Vue.component('article-edit', require('./components/article/Edit.vue'));
Vue.component('information-edit', require('./components/information/Edit.vue'));
Vue.component('research-create', require('./components/research/Create.vue'));
Vue.component('research-edit', require('./components/research/Edit.vue'));
Vue.component('user-research-create', require('./components/user-research/Create.vue'));
Vue.component('user-research-edit', require('./components/user-research/Edit.vue'));

const app = new Vue({
    el: '#app'
});
