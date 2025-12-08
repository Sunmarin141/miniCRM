<template>
    <div>
        <ul>
            <li><div>
                <span>Всего</span>
                <span class="money">0</span>
            </div></li>

            <li><div>
                <span>Скидка</span>
                <span class="money">0</span>
            </div></li>

            <li><div>
                <span>Оплата</span>
                <span class="money">0</span>
            </div></li>

            <li><div>
                <span>Бонусы за покупку</span>
                <span class="money">0</span>
            </div></li>
        </ul>
    </div>
</template>

<script setup>

</script>

<style scoped>
ul{
    display: flex;
    justify-content: space-around;
    background-color:lightblue ;
}
div{
    display: flex;
    
    flex-direction: column;
}
li{
    border: 1px dotted gray;
    width: 100%;
    list-style-type:none;
}

.money{
    font-size: 22px;
    font-weight: 600;
}

</style>