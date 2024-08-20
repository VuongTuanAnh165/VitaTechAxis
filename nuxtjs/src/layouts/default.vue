<script setup lang="ts">
import { Capacitor } from '@capacitor/core'

const footer = ref<{
    readonly height: number
}>()
const FooterContentMargin = 32

const footerHeight = computed(() => {
    return footer.value?.height ?? 0
})

const platform = Capacitor.getPlatform()

const { checkUpdateApp } = useAppChange()
const { appUrlOpen } = useDeepLinks()

const callAppAddListeners = async () => {
    if (platform !== 'web') {
        // await checkUpdateApp()
        appUrlOpen()
    }
}
await callAppAddListeners()

const storeVersion = useVersionStore()
const { updateApp } = storeToRefs(storeVersion)
</script>

<template>
    <slot />
</template>