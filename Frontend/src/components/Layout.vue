<template>
  <div>
    <header>
      <ButtonsLayout>
        <VButton @state="checkEmit" value="Поиск"></VButton>
        <VButton @state="checkEmit" value="Клиент"></VButton>
      </ButtonsLayout>
    </header>
    <main><slot /></main>
  </div>
</template>

<script setup>
import VButton from './VButton.vue'
import ButtonsLayout from './ButtonsLayout.vue'
const emit = defineEmits(['changePage'])

function checkEmit(event) {
  emit('changePage', event)
}
</script>

<style scoped>
header {
  display: flex;
  width: 100%;
  gap: 10px;
}
header div {
  width: 100%;
}
</style>
