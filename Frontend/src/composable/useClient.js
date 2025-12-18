import { ref } from "vue";

const phone = ref(false);

export function useClient(){
    const setPhone = (value) => phone.value = value;

    const getPhone = ()=> phone.value
    
    const clearPhone = ()=> phone.value = false;


    return {setPhone,getPhone,clearPhone}
}