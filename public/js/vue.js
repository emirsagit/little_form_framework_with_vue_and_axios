
class Errors {
    constructor() {
        this.errors = {};
    }

    record(errors) {
        this.errors = errors;
    }

    get(field) {
        if (this.errors[field]) return this.errors[field][0];
    }

    clear(field) {
      if (field) {
        delete this.errors[field];
        return;
      }
      this.errors = {};
    }

    has(field = null) {
        if (field) {
            return this.errors[field] ? true : false;
        }
        return Object.keys(this.errors).length > 0;
    }
}

class Form {
    constructor(data) {
        this.originalData = data;

        for(let field in data) {
          this[field] = data[field]
        }

        this.errors = new Errors();
    }

    data() {
      let data = {};

      for(let field in this.originalData) {
         data[field] = this[field]
      }

       return data;
    }

    submit(requestType, url) {
      return new Promise((resolve, reject) => {
        axios
            [requestType](url, this.data())
            .then((response) => {
              this.onSuccess(response.data);
              
              resolve(response.data);
            })
            .catch((error) => {
              this.onFail(error.response.data);

              reject(error.response.data);
            });
      })
    }

    onSuccess(data) {
      alert(data.message);

      this.errors.clear();

      this.empty();
    }

    onFail(data) {
      this.errors.record(data.errors)
    }

    empty() {
        Object.keys(this.originalData).forEach(field => {
            this[field] = "";
        });
    }
}

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
