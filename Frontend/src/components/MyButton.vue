<template>
    <div>
        <button>{{value}}</button>
        
    </div>
</template>

<script setup>
defineProps({
    value:String, 
})
</script>

<style scoped>
button{
    margin-top:20px ;
    width: 100%;
    padding: 10px;
    
}
</style>