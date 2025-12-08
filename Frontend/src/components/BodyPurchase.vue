<template>
    <div class="body-purchase">
        <ItemPurchase/>
    </div>
</template>

<script setup>
import ItemPurchase from './ItemPurchase.vue';
</script>

<style scoped>
.body-purchase{
    width: 100%;
    height: 70vh;
    padding: 10px;
    overflow-y: auto; 
}
</style>