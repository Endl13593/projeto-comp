<template>
    <div>
        <h2 class="text-center mt-3">Report</h2>
        <div>
            <form @submit.prevent="reportList">
                <input v-model="search" type="text" class="form-control" placeholder="Pesquise por MODEL, FAT_PART_NO ou PARTS_NO" />
                <button class="btn btn-success mt-1 mb-1">Pesquisar</button>
            </form>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>MODEL</th>
                <th>FAT_PART_NO</th>
                <th>TOTAL_LOCATION</th>
                <th>PARTS_NO</th>
                <th>UNT_USG</th>
                <th>DESCRIPTION</th>
                <th>REF_DESIGNATOR</th>
            </tr>
            </thead>
            <tbody>
<!--            <tr v-for="obj in data" :key="obj.id">-->
<!--                <td>{{ obj.id }}</td>-->
<!--                <td>{{ obj.dqc84.fat_part_no }}</td>-->
<!--                <td>{{ obj.parts_no }}</td>-->
<!--                <td>{{ obj.unt_usg }}</td>-->
<!--                <td>{{ obj.description }}</td>-->
<!--                <td>{{ obj.ref_designator }}</td>-->
<!--                <td>{{ obj.created_at }}</td>-->
<!--                <td>{{ obj.updated_at }}</td>-->
<!--            </tr>-->
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'ReportList',

    data() {
        return {
            search: '',
            data: []
        }
    },

    methods: {
        reportList() {
            this.axios
                .post(`report-list`, { search: this.search })
                .then((response) => {
                    this.data = response.data;
                });
        }
    },
};
</script>
