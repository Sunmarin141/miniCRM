<template>
  <div class="left-panel">
    <HeaderResults />
    <BodyPurchase />
    <ButtonsLayout>
      <VButton value="Отменить заказ"></VButton>
    </ButtonsLayout>
    <ButtonsLayout>
      <VButton value="Начать продажу" @click="handlerClick"></VButton>
      <VButton value="Оплатить"></VButton>
    </ButtonsLayout>

    <ModalLayout :isOpen="isOpen" @close="handlerClick">

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
const isOpen = ref(false);
function handlerClick(){
    isOpen.value == false? isOpen.value = true:isOpen.value = false;
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
