<template>
    <div>
        <h3 class="text-center mt-3">Criar DQC841</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="save">
                    <div class="form-group">
                        <label>FAT_PART_NO:</label><br />
                        <select class="form-select" v-model="obj.fat_part_no">
                            <option :value="0">Selecione uma opção</option>
                            <option v-for="item in dqc84" :key="item.id" :value="item.id">{{ item.fat_part_no }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>PARTS_NO:</label>
                        <input type="text" class="form-control" v-model="obj.parts_no">
                    </div>
                    <div class="form-group">
                        <label>UNT_USG:</label>
                        <input type="number" class="form-control" v-model="obj.unt_usg">
                    </div>
                    <div class="form-group">
                        <label>DESCRIPTION:</label>
                        <textarea class="form-control" rows="3" v-model="obj.description">{{ obj.description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>REF_DESIGNATOR:</label>
                        <textarea class="form-control" rows="3" v-model="obj.ref_designator">{{ obj.ref_designator }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CreateDqc841',

    data() {
        return {
            obj: {
                fat_part_no: 0,
                parts_no: '',
                unt_usg: 0,
                description: '',
                ref_designator: ''
            },
            dqc84: []
        }
    },

    created() {
        this.axios
            .get('get-dqc84')
            .then(response => {
                this.dqc84 = response.data;
            });
    },

    methods: {
        save() {
            this.axios
                .post('dqc-841', this.obj)
                .then(() => (
                    this.$router.push({ name: 'dqc-841-list' })
                ))
                .catch(err => console.log(err))
        }
    },
};
</script>

<style scoped>

</style>
