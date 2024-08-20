<script setup lang="ts">

const footer = ref<{
    readonly height: number
}>()
const FooterContentMargin = 32

const footerHeight = computed(() => {
    return footer.value?.height ?? 0
})

const storeVersion = useVersionStore()
const { updateApp } = storeToRefs(storeVersion)
</script>

<template>
    <slot />
</template>