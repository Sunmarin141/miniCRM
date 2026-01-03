import { defineStore } from "pinia";
import api from "../../services/api";

export const useSaleStore = defineStore('sale', {
    state: () => ({ purchase: []}),
    getters: {
      totalPrice: (state) => {
        return state.purchase.reduce((sum,item)=>{
            return sum+item.price
        },0)
      },
      totalDiscount: (state) => {
        return state.purchase.reduce((sum,item) => {
            return sum+item.discount
        },0)
      },
      paid(){
        return this.totalPrice - this.totalDiscount;
      },
      bonus(){
        return Math.floor(this.paid * 0.01);
      }
    },
    actions: {
        async getSales(){
            const worker_id = localStorage.getItem('worker_id');
            if(worker_id === null){
                this.clearPurchase();
                return;
            }
            const response = await api.get(`/sale/show/${worker_id}`);
            const result = response.data;
            this.purchase = result.data;
        },

        async addProductToBuy(id,quantity){
            if(quantity <=0){
                return;
            }
            await api.post('sale/create',{
                "worker_id": localStorage.getItem('worker_id'),
                "client_id": localStorage.getItem('client_id'),
                "current_good_id": id,
            })
            this.getSales();
        },

        async clearPurchase(){
            this.purchase = [];
        },

        async deleteWorkerSale(){
            await api.delete('/sale/delete',{
                data:{
                    "worker_id": localStorage.getItem('worker_id'),
                }
            });
            this.getSales();
        },

        async deleteItem(good_id){
            const worker_id = localStorage.getItem('worker_id');
            await api.delete(`/sale/delete/${worker_id}/${good_id}`)
            this.getSales();
        },
    },
  })