<template>
    <div>
        <h3 class="text-center">Edit {{ title }}</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="update">
                    <div class="form-group">
                        <label>MODEL:</label>
                        <input type="text" class="form-control" v-model="obj.model">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'EditDqcModel',

    data() {
        return {
            title: '',
            obj: {
                model: ''
            }
        }
    },

    created() {
        this.axios
            .get(`http://localhost/api/edit-dqc-model/${this.$route.params.id}`)
            .then((res) => {
                this.title = res.data.model;
                this.obj = res.data;
            });
    },

    methods: {
        update() {
            this.axios
                .patch(`http://localhost/api/update-dqc-model/${this.$route.params.id}`, this.obj)
                .then(() => {
                    this.$router.push({ name: 'dqc-model-list' });
                });
        }
    }
};
</script>

<style scoped>

</style>
