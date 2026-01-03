<template>
    <div class="body-purchase">
        <ItemPurchase v-for="item in purchaseStore.purchase"
        :key="item.id"
        :title="item.title"
        :price="item.price"
        :id="item.id"
        :discount="item.discount"
        @clickDeleteItem="deleteItem"
        />
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import ItemPurchase from './ItemPurchase.vue';
import { useSaleStore } from '@/store/sale';
const purchaseStore = useSaleStore();

function deleteItem(good_id){
    purchaseStore.deleteItem(good_id);
}

onMounted(()=>{
    purchaseStore.getSales();
});

</script>

<style scoped>
.body-purchase{
    width: 100%;
    height: 70vh;
    padding: 10px;
    overflow-y: auto; 
}
</style>