<script setup>

const themes = [
  {
    name: 'dark',
    icon: 'bx-moon',
  },
  {
    name: 'light',
    icon: 'bx-sun',
  },
]
</script>

<template>
  <div class="d-flex align-center">
    <ThemeSwitcher 
      :themes="themes" 
    />
  </div>
</template>
