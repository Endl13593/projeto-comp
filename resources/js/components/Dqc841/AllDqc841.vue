<template>
    <div>
        <h2 class="text-center mt-3">DQC841 Listagem</h2>
        <p><router-link to="/create-dqc-841" class="btn btn-success">Criar DQC841</router-link></p>
        <div class="table-responsive" v-loading="preloader">
            <table class="table">
            <thead>
            <tr>
                <th>FAT_PART_NO</th>
                <th>PARTS_NO</th>
                <th>UNT_USG</th>
                <th>DESCRIPTION</th>
                <th>REF_DESIGNATOR</th>
                <th>CREATED_AT</th>
                <th>UPDATED_AT</th>
                 <th style="width: 2%">#</th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="dataList.data.length <= 0">
                <td colspan="8"><h3 class="text-center">Não foram encontrados registros</h3></td>
            </tr>
            <tr v-for="obj in dataList.data" :key="obj.id">
                <td>{{ obj.dqc84.fat_part_no }}</td>
                <td>{{ obj.parts_no }}</td>
                <td>{{ obj.unt_usg }}</td>
                <td>{{ obj.description }}</td>
                <td>{{ obj.ref_designator ? obj.ref_designator.slice(0, 20)+'...' : '' }}</td>
                <td>{{ obj.created_at }}</td>
                <td>{{ obj.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-dqc-841', params: { id: obj.id }}" class="btn btn-primary">Editar</router-link>
                        <button class="btn btn-danger" @click.prevent="deleteObj(obj)">Excluir</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        </div>

        <PaginationComponent
            :pagination="dataList"
            :offset="offset"
            @paginate="getData"
        />

    </div>
</template>

<script>
import PaginationComponent from "../Partials/PaginationComponent";

export default {
    name: 'AllDqc841',

    components: { PaginationComponent },

    data() {
        return {
            dataList: {
                current_page: 1,
                last_page: 1,
                total: 0,
                per_page: 10,
                from: 0,
                to: 0,
                data: [],
            },
            offset: 4,
            preloader: false
        }
    },

    created() {
        this.getData()
    },

    methods: {
        getData() {
            this.preloader = true;
            this.axios
                .get(`dqc-841?page=${this.dataList.current_page}`)
                .then(response => {
                    this.dataList = response.data;
                }).finally(() => { this.preloader = false });
        },

        deleteObj(obj) {
            this.$confirm('Deseja realmente excluir <strong>' + obj.parts_no + ' </strong>?',
                'Excluir', {
                    dangerouslyUseHTMLString: true,
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    type: 'warning'})
                .then(() => {
                    this.axios.delete(`dqc-841/${obj.id}`)
                        .then(() => {
                            this.$message({
                                type: 'success',
                                message: 'Excluído com sucesso.'
                            })
                            let i = this.dataList.data.map(data => data.id).indexOf(obj.id);
                            this.dataList.data.splice(i, 1)
                        })
                        .catch(() => {
                            this.$message({
                                type: 'info',
                                message: 'Não foi possível Excluir, Tente novamente'
                            })
                        });
                }).catch(() => {});
        },
    },
};
</script>
