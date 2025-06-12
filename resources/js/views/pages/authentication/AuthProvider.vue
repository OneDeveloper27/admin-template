<script setup>
import axios from 'axios';
import { useTheme } from 'vuetify';

const { global } = useTheme()

const authProviders = [
  {
    icon: 'bxl-linkedin',
    color: '#0077b5',
    colorInDark: '#0077b5',
    provider: 'linkedin',
  },
  {
    icon: 'bxl-github',
    color: '#272727',
    colorInDark: '#fff',
    provider: 'github',
  },
  {
    icon: 'bxl-google',
    color: '#db4437',
    colorInDark: '#db4437',
    provider: 'google',
  },
]

async function authenticateWithProvider(provider) {
  try {
    // Get the redirect URL from your backend
    // await axios.get(`api/oauth/${provider}/callback`);
    // Redirect the user to the provider's auth page
    await axios.post(`api/oauth/${provider}/redirect`);
    // debugger;
    window.location.href;
  } catch (error) {
    console.error('Authentication error:', error)
    // Optionally show a notification to the user
  }
}
</script>

<template>
  <VBtn
    v-for="link in authProviders"
    :provider="link.provider"
    :key="link.icon"
    :icon="link.icon"
    variant="text"
    :color="global.name.value === 'dark' ? link.colorInDark : link.color"
    @click="authenticateWithProvider(link.provider)"
  />
</template>
