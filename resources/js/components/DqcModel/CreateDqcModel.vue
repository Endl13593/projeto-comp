<template>
    <div>
        <h3 class="text-center mt-3">Criar DQCMODEL</h3>
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
            }
        }
    },

    methods: {
        save() {
            this.axios
                .post('http://localhost/api/dqc-model', this.obj)
                .then(() => (
                    this.$router.push({ name: 'dqc-model-list' })
                ))
                .catch(err => console.log(err))
        }
    },
};
</script>

<style scoped>

</style>
