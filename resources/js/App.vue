<template>
    <div class="app">
        <h1>Carrito de compras</h1>
        <Card/>
    </div>
</template>

<script>
import { useStore } from 'vuex'
import { onMounted } from 'vue'
import Card from './components/Card'
export default {
    name: 'App',
    components: {
        Card
    },
    setup(){
        const store = useStore(); 
        onMounted(() => {
            store.dispatch('fechData') 

        })
    }
     

}
</script>