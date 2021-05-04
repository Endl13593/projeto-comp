<template>
    <div v-loading="preloader">
        <h3 class="text-center mt-3">Edit {{ title }}</h3>
        <div v-if="error" v-html="error" class="alert alert-danger"></div>
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
            },
            error: '',
            preloader: false
        }
    },

    created() {
        this.preloader = true;
        this.axios
            .get(`http://localhost/api/edit-dqc-model/${this.$route.params.id}`)
            .then((res) => {
                this.title = res.data.model;
                this.obj = res.data;
            }).finally(() => { this.preloader = false; });
    },

    methods: {
        update() {
            this.error = ''

            this.axios
                .patch(`http://localhost/api/update-dqc-model/${this.$route.params.id}`, this.obj)
                .then(() => {
                    this.$router.push({ name: 'dqc-model-list' });
                    this.$message({
                        message: 'Alteração realizada com sucesso!.',
                        type: 'success'
                    });
                })
                .catch(error => {
                    try {
                        for (let item in error.response.data.errors) {
                            this.error += error.response.data.errors[item][0] + '<br>'
                        }
                    } catch (e) {}
                });
        }
    }
};
</script>

<style scoped>

</style>
