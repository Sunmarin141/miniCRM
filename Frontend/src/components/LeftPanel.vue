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
      <div v-if="currentStep==steps.loginWorker">
        <h1>Начать продажу</h1>
        <input class="input-1c" v-model="data.code" @keydown.enter="startSelling" type="text" placeholder="Код">
        <button class="btn-submit" @click="startSelling">Начать</button>
        <button class="btn-submit" @click="closeModel">Отмена</button>
        <p>{{ errorCode }}</p>
      </div>
      <ClientRegisterModal @close-modal="closeModel" v-if="currentStep==steps.registerClient"/>
    </ModalLayout>
    
  </div>
</template>

<script setup>
import ClientRegisterModal from './pages/ClientRegisterModal.vue';
import { ref } from 'vue';
import HeaderResults from './HeaderResults.vue'
import BodyPurchase from './BodyPurchase.vue'
import ButtonsLayout from './ButtonsLayout.vue';
import VButton from './VButton.vue';
import ModalLayout from './ModalLayout.vue';
import api from '../../services/api';
import { useAuth } from '../composable/useAuth';
const {login,logout} = useAuth();

const isOpen = ref(false);
const errorCode = ref('');
const currentStep = ref(1);
const steps = ref({
  loginWorker: 1,
  registerClient: 2,
})
const data = ref({
  code: '',
});

async function logoutFn(){
  try{
    await api.delete('/worker/logout');
  }finally{
    logout();
    localStorage.clear('phone');
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
  currentStep.value = 1;
  data.value.code = '';
}

async function startSelling(){
  const response = await api.post('/worker/login',data.value);
  const result = response.data;
  if(result.status == 404){
    errorCode.value = "Неправильный код входа";
    return;
  }
  errorCode.value = "";
  currentStep.value = steps.value.registerClient;
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

.input-1c {
  width: 100%;
  padding: 6px 8px;
  margin: 10px 0;
  border: 1px solid #a0a0a0;
  background-color: #fff;
  font-size: 14px;
  box-sizing: border-box;
}

.btn-submit {
  gap:10px;
  padding: 6px 20px;
  background-color: #e6e6e6;
  color: #000;
  border: 1px solid #a0a0a0;
  cursor: pointer;
  font-size: 14px;
}

.btn-submit:hover {
  background-color: #d0d0d0;
}
</style>
