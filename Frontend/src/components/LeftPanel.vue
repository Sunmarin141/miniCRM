<template>
  <div class="left-panel">
    <HeaderResults />
    <BodyPurchase />
    <ButtonsLayout>
      <VButton value="Отменить заказ" @click="logoutFn"></VButton>
    </ButtonsLayout>
    <ButtonsLayout>
      <VButton value="Начать продажу" @click="openModal"></VButton>
      <VButton value="Оплатить"></VButton>
    </ButtonsLayout>

    <ModalLayout :isOpen="isOpen">
      <div v-if="page==1">
        <h1>Начать продажу</h1>
        <input class="input-1c" v-model="data.code" @keydown.enter="startSelling" type="text" placeholder="Код">
        <button class="btn-submit" @click="startSelling">Начать</button>
        <button class="btn-submit" @click="closeModel">Отмена</button>
      </div>
      <div v-if="page==2">
        <h1>Введите номер клиента</h1>
            <input class="input-1c" v-model="phone" type="text">
            <button class="btn-submit" @click="savePhone">Дальше</button>
            <button class="btn-submit" @click="closeModel">Пропустить</button>
      </div>
      <div v-if="page==3">
        <h1>Регистрация клиента</h1>
            <input class="input-1c" type="text" v-model="user.f_name">
            <input class="input-1c" type="text" v-model="user.s_name">
            <input class="input-1c" type="text" v-model="user.t_name">
            <input class="input-1c" type="mail" v-model="user.email">
            <button class="btn-submit" @click="registerClient">Завершить</button>
      </div>
    </ModalLayout>
    
  </div>
</template>

<script setup>
import { ref } from 'vue';
import HeaderResults from './HeaderResults.vue'
import BodyPurchase from './BodyPurchase.vue'
import ButtonsLayout from './ButtonsLayout.vue';
import VButton from './VButton.vue';
import ModalLayout from './ModalLayout.vue';
import api from '../../services/api';
import { useAuth } from '../compaseble/useAuth';
import { useClient } from '@/compaseble/useClient';
const {login,logout} = useAuth();
const {setPhone, getPhone, clearPhone} = useClient();
const user = ref({
  f_name: '',
  s_name: '',
  t_name: '',
  email: ''
})

const isOpen = ref(false);
const phone = ref('');
const page = ref(1);
const data = ref({
  code: '',
});

async function logoutFn(){
  try{
    await api.delete('/worker/logout');
  }finally{
    logout();
    clearPhone();
  }
}

function registerClient(){
  const phone = localStorage.getItem('phone');
  console.log(phone);
  api.post('/client/register',{
    f_name: user.value.f_name,
    s_name: user.value.s_name,
    t_name: user.value.t_name,
    phone: phone,
    email: user.value.email,
  })
  isOpen.value = false;
}

function openModal(){
    isOpen.value = true;
}

function closeModel(){
  isOpen.value = false;
}

async function savePhone(){
  localStorage.setItem('phone',phone.value);
  page.value+=1;
}

async function startSelling(){
  const response = await api.post('/worker/login',data.value,{
    headers: {
      'Content-type':'application/json'
    }
  });
  const result = response.data;
  page.value +=1;
  console.log(result.token);
  login(result.token);
}
</script>

<style scoped>
.left-panel {
  width: 50vw;
  height: calc(100vh - 10px);
  margin: 5px;
  border: 1px dotted gray;
}
</style>
