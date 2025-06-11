import { defineStore } from 'pinia'

export const useApplicationStore = defineStore('application', {
  state: () => ({
    // Example state
    appName: import.meta.env.VITE_APP_NAME || 'My Application',
    appVersion: import.meta.env.VITE_APP_VERSION,
    // Dark mode state
    darkMode: false,
  }),
  actions: {
    toggleDarkMode() {
      this.darkMode = !this.darkMode
    },
    setAppName(name) {
      this.appName = name
    },
  },
  getters: {
    isDarkMode: (state) => state.darkMode,
    upperCaseAppName: (state) => state.appName.toUpperCase(),
  },
})
