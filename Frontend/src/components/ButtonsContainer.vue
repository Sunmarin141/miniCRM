<template>
    <div class="parent">
        <div class="container">

        <MyButton value="Отменить заказ"/>
        </div>
        <div class="container">

        <MyButton value="Начать продажу"/>

        <MyButton value="Оплатить"/>
        </div>
    </div>
</template>

<script setup>
import MyButton from './MyButton.vue';
</script>

<style scoped>
div{
    display: flex;
    width: 100%;
    gap: 10px;
    margin-top:10px;
}

.parent{
    display: block;
}
</style>