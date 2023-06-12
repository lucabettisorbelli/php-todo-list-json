<!DOCTYPE html>
<html>

<head>
    <title>La mia app ToDo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div id="app">
        <div class="container text-center">

            <h1>La mia lista di ToDo</h1>

            <!-- Form per aggiungere un nuovo elemento alla lista -->
            <form @submit.prevent="addTodo">
                <input type="text" v-model="newTodo" placeholder="Aggiungi un nuovo elemento alla lista">
                <button class="btn btn-primary ms-2" type="submit">Aggiungi</button>
            </form>

            <!-- Elementi della lista -->
            <ul class="list-group">
                <li class="list-group-item" v-for="(todo, index) in data" :key="index">
                    {{ todo }}
                    <!-- Pulsante per rimuovere l'elemento dalla lista -->
                    <button class="btn btn-light ms-2" @click="removeTodo(index)">Rimuovi</button>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const app = Vue.createApp({
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
        });

        app.mount('#app');
    </script>
</body>

</html>