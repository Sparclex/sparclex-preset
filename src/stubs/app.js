require('./bootstrap');

window.Vue = require('vue');

// Register Components

const files = require.context('./components', true, /\.vue$/i);

files.keys().map(key => {
    return Vue.component(_.last(key.split('/')).split('.')[0], files(key));
});

const app = new Vue({
    el: '#app'
});
