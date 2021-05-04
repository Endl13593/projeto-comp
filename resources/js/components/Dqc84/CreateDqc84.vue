<template>
    <div>
        <h3 class="text-center mt-3">Criar DQC84</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="save">
                    <div class="form-group">
                        <label>FAT_PART_NO:</label>
                        <input type="text" class="form-control" v-model="obj.fat_part_no">
                    </div>
                    <div class="form-group">
                        <label>MODEL:</label><br />
                        <select class="form-select" v-model="obj.model">
                            <option :value="0">Selecione uma opção</option>
                            <option v-for="item in models" :key="item.id" :value="item.id">{{ item.model }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>TOTAL_LOCATION:</label>
                        <input type="number" class="form-control" v-model="obj.total_location">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CreateDqc84',

    data() {
        return {
            obj: {
                fat_part_no: '',
                model: '',
                total_location: 0
            },
            models: []
        }
    },

    created() {
        this.axios
            .get('get-models')
            .then(response => {
                this.models = response.data;
            });
    },

    methods: {
        save() {
            this.axios
                .post('dqc-84', this.obj)
                .then(() => (
                    this.$router.push({ name: 'dqc-84-list' })
                ))
                .catch(err => console.log(err))
        }
    },
};
</script>

<style scoped>

</style>
