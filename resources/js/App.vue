<template>
    <v-app>
        <Navbar />
        <v-main class="main-background">
            <v-row no-gutters>
                    <Sidebar />
                <v-col cols="12">
                    <router-view />
                </v-col>
            </v-row>
        </v-main>
    </v-app>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import Navbar from './components/common/Navbar.vue'
import Sidebar from "./components/common/Sidebar.vue";
import TableHome from "./components/views/Dashboard.vue";
export default defineComponent({
    components: {TableHome, Sidebar, Navbar }
})
</script>

<style scoped>
.main-background {
    background-color: #F5F5F5;
}
</style>
