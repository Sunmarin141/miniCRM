<template>
    <div>
        <button ref="myBtn" v-on:click="$emit('state',props.value)">{{value}}</button>
        
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { onMounted } from 'vue';
const emit = defineEmits(['state'])
const myBtn = ref(null);

const props = defineProps({
    value:String, 
})
const isLogin = ref(Boolean(localStorage.getItem('token')));
onMounted(()=>{
    myBtn.value.disabled = !isLogin.value;

    if(isLogin.value == false && props.value == "Начать продажу"){
        myBtn.value.disabled = false;
    }else if(isLogin.value == true && props.value == "Начать продажу"){
        myBtn.value.disabled = true;
    }
    if(isLogin.value == false && props.value == "Поиск"){
        myBtn.value.disabled = false;
    }
})
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