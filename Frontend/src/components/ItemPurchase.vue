<template>
    <div class="item-purchase">
        <span>{{title}}</span>
        <span v-if="discount>0" class="discount">{{price - discount}}</span>
        <span v-else>{{ price }}</span>
        <button v-on:click="emit('clickDeleteItem',props.id)">-</button>
    </div>
    
</template>

<script setup>
const props = defineProps({
    title: String,
    price: Number,
    id: Number,
    discount: Number,
});
const emit = defineEmits(['clickDeleteItem']);



</script>

<style scoped>
.item-purchase{
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 95%;
    height: 5vh;
    margin: 10px 0;
    border-top: 1px solid salmon;
    border-bottom: 1px solid salmon;
}

button{
    cursor: pointer;
    border: 1px solid salmon;
    background: none;
    position: absolute;
    width: 5%;
    height: 5vh;
    right: -30px;
}

.discount{
    color:orange;
}

</style>