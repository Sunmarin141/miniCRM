<template>
    <div class="parent">
        <div class="container">
            <slot></slot>    
        </div>
    </div>
</template>

<script setup>
</script>

<style scoped>
div{
    display: flex;
    width: 100%;
    gap: 10px;
    margin-top:10px;
}

.parent{
    display: block;
}
</style>