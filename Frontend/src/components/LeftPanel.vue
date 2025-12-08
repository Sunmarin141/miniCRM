<template>
    <div class="left-panel">
        <HeaderResults/>
        <BodyPurchase/>
        <ButtonsContainer/>
    </div>
</template>

<script setup>
import HeaderResults from './HeaderResults.vue';
import BodyPurchase from './BodyPurchase.vue';
import ButtonsContainer from './ButtonsContainer.vue';

</script>

<style scoped>
.left-panel{
    width: 50vw;
    height: calc(100vh - 10px);
    margin: 5px;
    border: 1px dotted gray;
}
.buttons-container{
    display: flex;
    width: 100%;
    gap: 10px;
}
</style>