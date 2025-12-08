<template>
    <div class="main-page">
        <LeftPanel/>
        <RightPanel/>
    </div>
</template>

<script setup>
import LeftPanel from '../LeftPanel.vue';
import RightPanel from '../RightPanel.vue';
</script>

<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.main-page{
    display: flex;
}
</style>