<template>
    <div>
        <button :disabled="isDisabled" v-on:click="$emit('state',props.value)">{{value}}</button>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { useAuth } from '../compaseble/useAuth';
const emit = defineEmits(['state'])
const isLogin = useAuth().isLogin;
const props = defineProps({
    value:String, 
})
const isDisabled = computed(() => {
  if (props.value === "Начать продажу") {
    return isLogin.value;
  }
  if (props.value === "Поиск") {
    return false;
  }
  return !isLogin.value;
});
</script>

<style scoped>
button{
    cursor: pointer;
    width: 100%;
    padding: 10px;
}
div{
    width: 100%;
}
button:disabled {
  cursor: not-allowed;
}
</style>