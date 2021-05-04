<template>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">HOME</router-link>
                    <router-link to="/dqc-model-list" class="nav-item nav-link">DQCMODEL</router-link>
                    <router-link to="/dqc-84-list" class="nav-item nav-link">DQC84</router-link>
                    <router-link to="/dqc-841-list" class="nav-item nav-link">DQC841</router-link>
                    <router-link to="/report-list" class="nav-item nav-link">REPORT</router-link>
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>

<script>
export default {
    name: "Template"
}
</script>

<style scoped>

</style>
