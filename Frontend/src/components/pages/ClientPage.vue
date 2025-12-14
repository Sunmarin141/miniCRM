<template>
    <div class="clint-page">
        <h1>Персональная информация</h1>
        <div class="personal-information">
  <div class="info-row">
    <span class="label">Имя</span>
    <span class="value">{{ client.first_name }}</span>
  </div>
  <div class="info-row">
    <span class="label">Фамилия</span>
    <span class="value">{{ client.second_name }}</span>
  </div>
  <div class="info-row">
    <span class="label">Отчество</span>
    <span class="value">{{ client.third_name }}</span>
  </div>
  <div class="info-row">
    <span class="label">Email</span>
    <span class="value">{{ client.email }}</span>
  </div>
  <div class="info-row">
    <span class="label">Телефон</span>
    <span class="value">{{ client.phone }}</span>
  </div>
  <div class="info-row">
    <span class="label">Бонусы</span>
    <span class="value bonus">{{ client.bonuses }}</span>
  </div>
</div>

        <h2>История покупок</h2>
        <div class="purchase-history">
            <table>
                <thead>
                    <tr>
                        <th>Магазин</th>
                        <th>Товар</th>
                        <th>Стоимость</th>
                        <th>Начислено бонусов</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <p>история покупок пуста</p>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import api from '../../../services/api';
const phone = localStorage.getItem('phone');
const client = ref({});
async function findByPhone(){
    const response = await api.post('/client/phone',{phone:phone,});
    client.value = response.data[0];
}

onMounted(()=>{
    findByPhone();
})

</script>

<style scoped>

.personal-information{
    display: flex;
    flex-direction: column;
    height: 50vh;
    border: 1px dotted gray;
}

table{
    width: 100%;
    border-collapse: collapse;

}
th{ 
    text-align: start;
    border: 1px solid black;
    background: #F5F5F5;
}

.info-row {
    display: grid;
    grid-template-columns: 160px 1fr;
    border-bottom: 1px solid #d0d0d0;
}

.label {
    background: #e6e6e6;
    padding: 6px 8px;
    font-weight: 600;
    border-right: 1px solid #bfbfbf;
}

.value {
    background: #ffffff;
    padding: 6px 8px;
}

.value.bonus {
    font-weight: 600;
}

</style>