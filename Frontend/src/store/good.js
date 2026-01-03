import { defineStore } from 'pinia'

export const useGoodStore = defineStore('good', {
    state: () => ({ selectGood: []}),
    getters: {
      doubleCount: (state) => state.count * 2,
    },
    actions: {

    },
  })