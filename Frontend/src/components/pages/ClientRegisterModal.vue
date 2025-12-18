<template>
    <div>
        <div v-if="currentStep==steps.enterPhone">
        <h1>Введите номер клиента</h1>
            <input class="input-1c" v-model="phone" type="text">
            <button class="btn-submit" @click="savePhone">Дальше</button>
            <button class="btn-submit" @click="closeModal">Пропустить</button>
      </div>
      <div v-if="currentStep==steps.enterInformation">
        <h1>Регистрация клиента</h1>
            <input class="input-1c" type="text" placeholder="Имя" v-model="user.f_name">
            <input class="input-1c" type="text" placeholder="Фамилия" v-model="user.s_name">
            <input class="input-1c" type="text" placeholder="Отчество" v-model="user.t_name">
            <input class="input-1c" type="mail" placeholder="Электронная почта" v-model="user.email">
            <button class="btn-submit" @click="registerClient">Завершить</button>
      </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import api from '../../../services/api';
const emit = defineEmits(['closeModal','changeStep','successfulRegistration'])
const user = ref({
  f_name: '',
  s_name: '',
  t_name: '',
  email: ''
})

const currentStep = ref(1);
const steps = ref({
  enterPhone: 1,
  enterInformation: 2,
})
const phone = ref('');

function closeModal(){
    emit('closeModal');
    emit('changeStep');
}

async function savePhone(){
  localStorage.setItem('phone',phone.value);
  if(await isHasAccount() == true){
    console.log('res');
    closeModal();
    return;
  }
  currentStep.value = steps.value.enterInformation;
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
  closeModal();
  emit('successfulRegistration');
}

async function isHasAccount(){
    const phone = localStorage.getItem('phone');
    const response = await api.post('/client/phone', {
        phone:phone,
    })
    const result = response.data;
    if(result.status == 200){
      return true;
    }
    return false;
}

</script>

<style scoped>

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