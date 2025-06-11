<script setup>
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
</script>

<template>
  <VBtn
    v-for="link in authProviders"
    :provider="link.provider"
    :key="link.icon"
    :icon="link.icon"
    variant="text"
    :color="global.name.value === 'dark' ? link.colorInDark : link.color"
  />
</template>
