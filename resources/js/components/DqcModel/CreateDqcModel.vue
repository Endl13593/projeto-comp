<template>
    <div>
        <h3 class="text-center mt-3">Criar DQCMODEL</h3>
        <div v-if="error" v-html="error" class="alert alert-danger"></div>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="save">
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
    name: 'CreateDqcModel',

    data() {
        return {
            obj: {
                model: ''
            },
            error: ''
        }
    },

    methods: {
        save() {
            this.error = '';

            this.axios
                .post('http://localhost/api/dqc-model', this.obj)
                .then(() => {
                    this.$router.push({name: 'dqc-model-list'})
                    this.$message({
                        message: 'Cadastro realizado com sucesso!.',
                        type: 'success'
                    });
                })
                .catch(error => {
                    try {
                        for (let item in error.response.data.errors) {
                            this.error += error.response.data.errors[item][0] + '<br>'
                        }
                    } catch (e) {}
                })
        }
    },
};
</script>

<style scoped>

</style>
