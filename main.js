const { createApp } = Vue;

createApp ({
    data() {
        return {
            // Array per memorizzare i dati ricevuti da api.php
            newTask: '',
            todoList: []
        }
    },
    methods: {
        // Metodo per rimuovere un elemento dalla lista
        removeTodo(index) {
            const data = { removeIndex: index };
            this.sendData(data);
        },
        // Metodo per inviare un nuovo task al server
        addNewTask() {
            const data = { newTask: this.newTask };
            this.sendData(data);
        },
        // Metodo per inviare dati al server
        sendData(data) {
            //Faccio una chiamata POST ad api.php, passando il data
            axios.post('api.php', data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                console.log("Dati ricevuti: ", response.data);
                this.todoList = response.data;
                this.newTask = "";
            })
        }
    },
    mounted() {
        // Effettua una chiamata Axios a api.php
        axios.get('api.php').then(response => {
        console.log(response);
        this.todoList = response.data;
        })
    }
}).mount('#app');