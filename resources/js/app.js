/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');
var Paginate = require('vuejs-paginate')


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home-step-component', require('./components/HomeStepComponent.vue').default);
Vue.component('favorite-step-component', require('./components/FavoriteStepComponent.vue').default);
Vue.component('my-step-component', require('./components/MyStepComponent.vue').default);
Vue.component('my-challenge-component', require('./components/MyChallengeComponent.vue').default);
Vue.component('progress-bar-component', require('./components/ProgressBarComponent.vue').default);
Vue.component('child-step-component', require('./components/ChildStepComponent.vue').default);
Vue.component('child-step-edit-component', require('./components/ChildStepEditComponent.vue').default);
Vue.component('step-detail-component', require('./components/StepDetailComponent.vue').default);
Vue.component('user-step-component', require('./components/UserStepComponent.vue').default);


Vue.component('paginate', Paginate)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

require('./jquery');

//ブラウザバック時にページを再読み込み
window.onpageshow = function (event) {
    if (event.persisted) {
        window.location.reload();
    }
};
