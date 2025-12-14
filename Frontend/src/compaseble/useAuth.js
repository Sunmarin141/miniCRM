import { ref } from "vue";

const isLogin = ref(Boolean(localStorage.getItem('token')));

export function useAuth(){
    const login = (token) => {
        localStorage.setItem('token',token);
        isLogin.value = true;
    }

    const logout = () => {
        localStorage.removeItem('token');
        isLogin.value = false;
    }

    return {
        isLogin,
        login,
        logout,
    }
}