import { SafeArea } from 'capacitor-plugin-safe-area'

export default defineNuxtPlugin(async () => {
  const { insets } = await SafeArea.getSafeAreaInsets()

  return {
    provide: {
      safeArea: insets
    }
  }
})
