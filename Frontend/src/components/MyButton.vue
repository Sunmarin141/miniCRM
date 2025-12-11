<template>
    <div>
        <button v-on:click="$emit('state',value)">{{value}}</button>
        
    </div>
</template>

<script setup>
const emit = defineEmits(['state'])

defineProps({
    value:String, 
})
</script>

<style scoped>
button{
    width: 100%;
    padding: 10px;
    
}
</style>