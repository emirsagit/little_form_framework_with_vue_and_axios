require('./bootstrap');
import Vue from 'vue';
import Form from './dependencies/form.js'

var app = new Vue({
    el: "#app",
    data: {
        form: new Form({
            name: "",
            body: ""
        })
    },
    methods: {
      onSubmit() {
        this.form.submit('post', '/form')
        .then(data => console.log(data))
        .catch(error => console.log(error));  
      }
    },
});


