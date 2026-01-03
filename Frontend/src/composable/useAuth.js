import { ref } from "vue";

const isLogin = ref(Boolean(localStorage.getItem('token')));

export function useAuth(){
    const login = (token) => {
        localStorage.setItem('token',token);
        isLogin.value = true;
    }

    const loginId = (worker_id) => {
        localStorage.setItem('worker_id',worker_id);
    }

    const logout = () => {
        localStorage.removeItem('token');
        localStorage.removeItem('worker_id');
        isLogin.value = false;
    }

    return {
        isLogin,
        login,
        logout,
        loginId,
    }
}