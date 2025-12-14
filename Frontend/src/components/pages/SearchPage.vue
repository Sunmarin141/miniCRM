<template>
    <div>
        <div class="search">
            <input v-model="inputSearch" class="inputSearch" type="input" placeholder="Поиск">

        </div>
        <div class="result-search">
            
            <table class="search-table">
                <thead>
                    <tr>
                        <th>Артикул</th>
                        <th>Наименование</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr v-on:click="selectProduct(good.id)" v-for="good in filteredGoods" :key="good.id">
                        <td>{{ good.code }}</td>
                        <td>{{ good.title }}</td>
                    </tr>
                </tbody>
            </table>

            <p class="error">{{ errorMessage }}</p>
        </div>

        <div class="product-quantity">
            
            <table class="quantity-table">
                <thead>
                    <tr>
                        <th>Магазин</th>
                        <th>Колличество</th>
                        <th>Цена</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in currentProduct"">
                        <td>{{product.store}}</td>
                        <td>{{ product.quantity }}</td>
                        <td>{{ product.price }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { computed, onMounted, ref } from 'vue';
import api from '../../../services/api';

onMounted(()=>{
    async function query(){
        try{
            const response = await api.get('goods');
            allGoods.value = response.data;
        }catch($error){
            errorMessage.value = $error.message;
            console.log(errorMessage);
        }
    }
    query();
});

async function selectProduct(id){
    const response = await api.get(`/goods/${id}`);
    currentProduct.value = response.data.data;
    console.log(currentProduct.value);
}

const allGoods = ref([]);
const inputSearch = ref();
const currentProduct = ref([]);
const errorMessage = ref();
const filteredGoods = computed(()=>{
    if(!inputSearch.value) return allGoods.value;
    return allGoods.value.filter((v) => v.title.toLowerCase().includes(inputSearch.value.toLowerCase()));
})
</script>

<style scoped>
.search{
    gap:10px;
    margin-top: 20px;
    display: flex;
    justify-content: end;
    margin-bottom: 10px;
}
.inputSearch{
    width: 40%;
    padding: 4px 8px;
    border: 1px solid #c0c0c0;
    font-family: Arial, sans-serif;
    font-size: 13px;
}


.result-search{
    border: 1px solid #c0c0c0;
    background: white;
}

.error{
    text-align: center;
    font-size: 16px;
    color: red;
}

.search-table{
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}

.search-table thead{
    background: linear-gradient(to bottom, #f5f5f5 0%, #e8e8e8 100%);
}

.search-table th{
    text-align: left;
    padding: 6px 8px;
    font-weight: bold;
    color: #000;
    border-right: 1px solid #d0d0d0;
}

.search-table td{
    cursor: pointer;
    padding: 4px 8px;
    border-right: 1px solid #e0e0e0;
}


.search-table{
    max-height: 60vh;
}

.result-search{
    overflow: auto;
    height: 60vh;
}

.product-quantity{
    margin-top: 20px;
    width: 100%;
    height: 20vh;
    border: 1px #F5F5F5 solid;
}

.quantity-table{
    width: 100%;
    border-collapse: collapse;
}

.quantity-table th{
    text-align: start;
    border: 1px solid black;
    background: #F5F5F5;
}


.quantity-table tbody tr:first-child td{
    border-top: none;
}
.quantity-table td{

    border-top: 1px solid black;
    border-bottom: 1px solid black;
    
}

</style>