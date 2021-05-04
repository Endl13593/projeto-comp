<template>
    <div>
        <h2 class="text-center mt-3">DQC84 Listagem</h2>
        <p><router-link to="/create-dqc-84" class="btn btn-success">Criar DQC84</router-link></p>
        <table class="table">
            <thead>
            <tr>
                <th>FAT_PART_NO</th>
                <th>MODEL</th>
                <th>TOTAL_LOCATION</th>
                <th>CREATED_AT</th>
                <th>UPDATED_AT</th>
                 <th style="width: 2%">#</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="obj in data" :key="obj.id">
                <td>{{ obj.fat_part_no }}</td>
                <td>{{ obj.dqc_model.model }}</td>
                <td>{{ obj.total_location }}</td>
                <td>{{ obj.created_at }}</td>
                <td>{{ obj.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-dqc-84', params: { id: obj.id }}" class="btn btn-primary">Editar</router-link>
                        <button class="btn btn-danger" @click.prevent="deleteObj(obj.id)">Excluir</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'AllDqc84',

    data() {
        return {
            data: []
        }
    },

    created() {
        this.axios
            .get('dqc-84')
            .then(response => {
                this.data = response.data;
            });
    },

    methods: {
        deleteObj(id) {
            this.axios
                .delete(`dqc-84/${id}`)
                .then(() => {
                    let i = this.data.map(data => data.id).indexOf(id);
                    this.data.splice(i, 1)
                });
        }
    },
};
</script>
