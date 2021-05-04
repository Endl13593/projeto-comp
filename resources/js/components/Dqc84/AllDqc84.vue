<template>
    <div>
        <h2 class="text-center mt-3">DQC84 Listagem</h2>
        <p><router-link to="/create-dqc-84" class="btn btn-success">Criar DQC84</router-link></p>
        <table class="table" v-loading="preloader">
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
            <tr v-if="data.length <= 0">
                <td colspan="6"><h3 class="text-center">Não foram encontrados registros</h3></td>
            </tr>
            <tr v-for="obj in data" :key="obj.id">
                <td>{{ obj.fat_part_no }}</td>
                <td>{{ obj.dqc_model.model }}</td>
                <td>{{ obj.total_location }}</td>
                <td>{{ obj.created_at }}</td>
                <td>{{ obj.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-dqc-84', params: { id: obj.id }}" class="btn btn-primary">Editar</router-link>
                        <button class="btn btn-danger" @click.prevent="deleteObj(obj)">Excluir</button>
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
            data: [],
            preloader: false
        }
    },

    created() {
        this.preloader = true;
        this.axios
            .get('dqc-84')
            .then(response => {
                this.data = response.data;
            }).finally(() => { this.preloader = false; });
    },

    methods: {
        deleteObj(obj) {
            this.$confirm('Deseja realmente excluir <strong>' + obj.fat_part_no + ' </strong>?',
                'Excluir', {
                    dangerouslyUseHTMLString: true,
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    type: 'warning'})
                .then(() => {
                    this.axios.delete(`dqc-84/${obj.id}`)
                        .then(() => {
                            this.$message({
                                type: 'success',
                                message: 'Excluído com sucesso.'
                            })
                            let i = this.data.map(data => data.id).indexOf(obj.id);
                            this.data.splice(i, 1)
                        })
                        .catch(() => {
                            this.$message({
                                type: 'info',
                                message: 'Não foi possível Excluir, Tente novamente'
                            })
                        });
                }).catch(() => {});
        }
    },
};
</script>
