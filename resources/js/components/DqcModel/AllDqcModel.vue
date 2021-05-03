<template>
    <div>
        <h2 class="text-center">DQC Model Listagem</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                 <th style="width: 2%">#</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="obj in data" :key="obj.id">
                <td>{{ obj.id }}</td>
                <td>{{ obj.model }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-dqc-model', params: { id: obj.id }}" class="btn btn-primary">Editar</router-link>
                        <button class="btn btn-danger" @click.prevent="deleteProduct(obj.id)">Excluir</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'AllDqcModel',

    data() {
        return {
            data: []
        }
    },

    created() {
        this.axios
            .get('http://localhost/api/dqc-models')
            .then(response => {
                this.data = response.data;
            });
    },

    methods: {
        deleteProduct(id) {
            this.axios
                .delete(`http://localhost/api/dqc-models/${id}`)
                .then(() => {
                    let i = this.data.map(data => data.id).indexOf(id);
                    this.data.splice(i, 1)
                });
        }
    },
};
</script>

<style scoped>

</style>
