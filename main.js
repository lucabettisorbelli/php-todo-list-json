const { createApp } = Vue;

createApp ({
    data() {
        return {
            // Array per memorizzare i dati ricevuti da api.php
            data: [],
            newTodo: '',
        }
    },
    methods: {
        // Metodo per aggiungere un nuovo elemento alla lista
        addTodo() {
            if (this.newTodo) {
                this.data.push(this.newTodo);
                this.newTodo = '';
            }
        },
        // Metodo per rimuovere un elemento dalla lista
        removeTodo(index) {
            this.data.splice(index, 1);
        }
    },
    mounted() {
        // Effettua una chiamata Axios a api.php
        axios.get('api.php').then(response => {
        console.log(response);
        this.data = response.data;
        })
    }
}).mount('#app');