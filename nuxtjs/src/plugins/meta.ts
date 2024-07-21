export default defineNuxtPlugin(() => {
  const {
    public: {
      appName
    }
  } = useRuntimeConfig()

  useHead({
    titleTemplate (chunk) {
      return chunk ? `${chunk} - ${appName}` : appName
    }
  })
})
