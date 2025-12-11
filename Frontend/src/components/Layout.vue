<template>
    <div>
        <header>
            <MyButton value="Поиск" @state="checkEmit"/>
            <MyButton value="Клиент" @state="checkEmit"/>
        </header>
        <main><slot/></main>
    </div>
</template>

<script setup>
import MyButton from './MyButton.vue';

const emit = defineEmits(['changePage'])

function checkEmit(event){
    emit('changePage',event);
}


</script>

<style scoped>
header{
    display: flex;
    width: 100%;
    gap: 10px;
}
header div{
    width: 100%;
}
</style>