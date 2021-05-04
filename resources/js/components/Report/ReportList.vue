<template>
    <div>
        <h2 class="text-center mt-3">Report</h2>
        <div>
            <form @submit.prevent="reportList">
                <input v-model="search" type="text" class="form-control" placeholder="Pesquise por MODEL, FAT_PART_NO, PARTS_NO ou DESCRIPTION" />
                <button class="btn btn-primary mt-1 mb-1" :disabled="btnActive">{{ btnActive ? 'Pesquisando...' : 'Pesquisar' }}</button>
            </form>
            <button @click.prevent="exportExcel" class="btn btn-success mt-1 mb-1" :disabled="btnExport">{{ btnExport ? 'Exportando...' : 'Exportar Excel' }}</button>
        </div>
        <div class="table-responsive" v-loading="preloader">
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
                <tr v-if="dataList.data.length <= 0">
                    <td colspan="7"><h3 class="text-center">Não foram encontrados registros</h3></td>
                </tr>
                <tr v-for="obj in dataList.data" :key="obj.id">
                    <td>{{ obj.dqc84.dqc_model.model }}</td>
                    <td>{{ obj.dqc84.fat_part_no }}</td>
                    <td>{{ obj.dqc84.total_location }}</td>
                    <td>{{ obj.parts_no }}</td>
                    <td>{{ obj.unt_usg }}</td>
                    <td>{{ obj.description }}</td>
                    <td>{{ obj.ref_designator ? obj.ref_designator.slice(0, 20)+'...' : '' }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <PaginationComponent
            v-if="dataList.data.length > 0"
            :pagination="dataList"
            :offset="offset"
            @paginate="reportList"
        />

    </div>
</template>

<script>
import PaginationComponent from "../Partials/PaginationComponent";
export default {
    name: 'ReportList',

    components: { PaginationComponent },

    data() {
        return {
            btnActive: false,
            btnExport: false,
            search: '',
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
        this.reportList();
    },

    methods: {
        reportList() {
            this.preloader = true;
            this.btnActive = true;
            this.axios
                .get(`report-list?page=${this.dataList.current_page}&search=${this.search}`)
                .then((response) => {
                    this.dataList = response.data;
                })
            .finally(() => {
                this.preloader = false;
                this.btnActive = false;
            });
        },

        exportExcel() {
            this.btnExport = true;

            this.axios({
                method      : 'post',
                url         : 'export-report',
                responseType: 'arraybuffer',
                data        : { search: this.search }
            })
            .then((response)=>{
                try {
                    let blob = new Blob([response.data], {
                        type: response.headers['content-type']
                    })
                    let link = document.createElement('a')
                    let url = window.URL.createObjectURL(blob)
                    link.setAttribute('href', url)
                    link.setAttribute('download', 'report-export.xlsx')
                    link.style.visibility = 'hidden'
                    document.body.appendChild(link)
                    link.click()
                    document.body.removeChild(link)
                } catch (e) {
                    console.log('Não foi possivel Fazer o Download')
                    console.log(e)
                }
            }).catch((error)=>{
                console.log(error)
            }).finally(() => { this.btnExport = false; });
        }
    },
};
</script>
