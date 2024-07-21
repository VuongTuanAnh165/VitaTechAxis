<script setup lang="ts">
const { appAddListeners } = useApp()
appAddListeners()
</script>
<template>
    <div>
        <NuxtRouteAnnouncer />
        <NuxtWelcome />
    </div>
</template>
