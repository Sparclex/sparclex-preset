require('./bootstrap');

window.Vue = require('vue');

// Register Components

const files = require.context('./components', true, /\.vue$/i);

files.keys().map(key => {
    let parts = key.split('/');
    return Vue.component(parts[parts.length - 1].split('.')[0], files(key));
});

const app = new Vue({
    el: '#app'
});
