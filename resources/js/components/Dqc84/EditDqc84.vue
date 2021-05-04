<template>
    <div>
        <h3 class="text-center mt-3">Edit {{ title }}</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="update">
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
    name: 'EditDqc84',

    data() {
        return {
            title: '',
            obj: {
                fat_part_no: '',
                model: 0,
                total_location: 0
            },
            models: []
        }
    },

    created() {
        this.axios
            .get(`edit-dqc-84/${this.$route.params.id}`)
            .then((res) => {
                this.title = res.data.fat_part_no;
                this.obj = res.data;
            });

        this.axios
            .get('get-models')
            .then(response => {
                this.models = response.data;
            });
    },

    methods: {
        update() {
            this.axios
                .patch(`update-dqc-84/${this.$route.params.id}`, this.obj)
                .then(() => {
                    this.$router.push({ name: 'dqc-84-list' });
                });
        }
    }
};
</script>

<style scoped>

</style>
