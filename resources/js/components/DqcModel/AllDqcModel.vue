<template>
    <div>
        <h2 class="text-center mt-3">DQCMODEL Listagem</h2>
        <p><router-link to="/create-dqc-model" class="btn btn-success">Criar DQCMODEL</router-link></p>
        <table class="table" v-loading="preloader">
            <thead>
            <tr>
                <th>MODEL</th>
                 <th style="width: 2%">#</th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="data.length <= 0">
                <td colspan="2"><h3 class="text-center">Não foram encontrados registros</h3></td>
            </tr>
            <tr v-for="obj in data" :key="obj.id">
                <td>{{ obj.model }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-dqc-model', params: { id: obj.id }}" class="btn btn-primary">Editar</router-link>
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
    name: 'AllDqcModel',

    data() {
        return {
            data: [],
            preloader: false
        }
    },

    created() {
        this.preloader = true;
        this.axios
            .get('http://localhost/api/dqc-models')
            .then(response => {
                this.data = response.data;
            }).finally(() => this.preloader = false);
    },

    methods: {
        deleteObj(obj) {
            this.$confirm('Deseja realmente excluir <strong>' + obj.model + ' </strong>?',
                'Excluir', {
                    dangerouslyUseHTMLString: true,
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    type: 'warning'})
                .then(() => {
                    this.axios.delete(`http://localhost/api/dqc-models/${obj.id}`)
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
