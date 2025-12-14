<template>
  <div v-if="isOpen" class="modal">
    <div class="modal-content">
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
    isOpen: Boolean
})

const emit = defineEmits(['close']);
</script>

<style scoped>
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.modal-content {
  background: #f5f5f5;
  padding: 20px;
  max-width: 500px;
  width: 90%;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
  font-family: "Arial", sans-serif;
}

::v-deep(.input-1c) {
  width: 100%;
  padding: 6px 8px;
  margin: 10px 0;
  border: 1px solid #a0a0a0;
  background-color: #fff;
  font-size: 14px;
  box-sizing: border-box;
}

::v-deep(.btn-submit) {
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
