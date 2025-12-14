<template>
    <div class="right-panel">
        <Layout @changePage="changePage">
            <SearchPage v-if="currentPage == 'Поиск'"/>
            <ClientPage v-if="currentPage == 'Клиент'"/>
        </Layout>
    </div>
</template>

<script setup>
import ClientPage from './pages/ClientPage.vue';
import Layout from './Layout.vue';
import { ref, watch } from 'vue';
import SearchPage from './pages/SearchPage.vue';
import { useAuth } from '@/compaseble/useAuth';

const {isLogin} = useAuth();
const currentPage = ref('Поиск');

function changePage(page){
    currentPage.value = page;
}

watch(isLogin,(newLogin,oldValue)=>{
    console.log(`Статус авторизации изменился: ${oldValue} → ${newLogin}`);
    if(!newLogin){
        currentPage.value = 'Поиск';
    }
})

</script>

<style scoped>
.right-panel{
    width: 50vw;
    height: calc(100vh - 10px);
    margin: 5px;
    border: 1px dotted gray;
}


</style>