<template>
  <div class="left-panel">
    <HeaderResults />
    <BodyPurchase />
    <ButtonsLayout>
      <VButton value="Отменить заказ" @click="logoutFn"></VButton>
    </ButtonsLayout>
    <ButtonsLayout>
      <VButton value="Начать продажу" @click="openModal"></VButton>
      <VButton value="Оплатить" @click="completePurchase"></VButton>
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
      <div v-if="currentStep==steps.completePurchase">
        <h1>Спасибо за покупку</h1>
        <div v-if="client_id">
          <h2>На ваш аккаунт поступило {{ bonusPurchase }} бонусов</h2>
        </div>
        <button class="btn-submit" @click="closeModel">X</button>
      </div>
    </ModalLayout>
    
  </div>
</template>

<script setup>
import ClientRegisterModal from './pages/ClientRegisterModal.vue';
import { ref, toRaw } from 'vue';
import HeaderResults from './HeaderResults.vue'
import BodyPurchase from './BodyPurchase.vue'
import ButtonsLayout from './ButtonsLayout.vue';
import VButton from './VButton.vue';
import { useGoodStore } from '@/store/good';
import ModalLayout from './ModalLayout.vue';
import api from '../../services/api';
import { useAuth } from '../composable/useAuth';
import { useSaleStore } from '@/store/sale';
const {login,logout,loginId} = useAuth();

const isOpen = ref(false);
const sale = useSaleStore();
const good = useGoodStore();
const errorCode = ref('');
const currentStep = ref(1);
const steps = ref({
  loginWorker: 1,
  registerClient: 2,
  completePurchase:3,
})
const client_id = ref();
const data = ref({
  code: '',
});
const bonusPurchase = ref('');

async function logoutFn(){
  await sale.deleteWorkerSale();
  try{
    await api.delete('/worker/logout');
  }finally{
    logout();
    localStorage.clear('phone');
    sale.clearPurchase();
    client_id.value = ''
  }
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
  loginId(result.worker_id);
  sale.getSales();
}

async function completePurchase(){
  isOpen.value = true;
  currentStep.value = 3;
  let purchaseBody = sale.purchase.map((item) => ({
    current_good_id: item.id,
  }));
  const purchase = JSON.stringify(purchaseBody);
  const response = await api.post('/current-good/updateQuantity',purchase);
  const result = await response.data;
  good.selectGood = [];
  client_id.value = localStorage.getItem('client_id');

  if(client_id.value === null){
    logoutFn();
    return;
  }
  bonusPurchase.value = sale.bonus;
  api.post(`/client/update/${client_id.value}`,{"bonuses":bonusPurchase.value});
  sale.deleteWorkerSale();
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
