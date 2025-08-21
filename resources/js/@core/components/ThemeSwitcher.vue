<script setup>
import { useCycleList } from '@vueuse/core'
import Cookies from 'js-cookie'
import { onMounted, watch } from 'vue'
import { useTheme } from 'vuetify'

const props = defineProps({
  themes: {
    type: Array,
    required: true,
  },
})

const {
  name: themeName,
  global: globalTheme,
} = useTheme()

// Initialize theme from cookie or default to first theme in the list
const initialThemeName = Cookies.get('sekolah_cikal_theme') || props.themes[0].name

const {
  state: currentThemeName,
  next: getNextThemeName,
  index: currentThemeIndex,
} = useCycleList(props.themes.map(t => t.name), { initialValue: initialThemeName })

const changeTheme = () => {
  const nextTheme = getNextThemeName()
  globalTheme.name.value = nextTheme

  // Save the theme to cookie
  Cookies.set('sekolah_cikal_theme', nextTheme, { expires: 30 })
}

// Update icon if theme is changed from other sources
watch(() => globalTheme.name.value, val => {
  currentThemeName.value = val
  //Also update the cookie if theme is changed from other sources
  Cookies.set('sekolah_cikal_theme', val, { expires: 30 })
})

// Set initial theme on mount
onMounted(() => {
  globalTheme.name.value = currentThemeName.value
})
</script>

<template>
  <IconBtn @click="changeTheme">
    <VIcon :icon="props.themes[currentThemeIndex].icon" />
    <VTooltip
      activator="parent"
      open-delay="1000"
      scroll-strategy="close"
    >
      <span class="text-capitalize">{{ currentThemeName }}</span>
    </VTooltip>
  </IconBtn>
</template>
