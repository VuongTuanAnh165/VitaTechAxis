import type { CapacitorConfig } from '@capacitor/cli'

const config: CapacitorConfig = {
  appId: 'com.example.app',
  appName: 'nuxt-app',
  webDir: '.output/public',
  plugins: {
    CapacitorHttp: {
      enabled: true
    },
    PushNotifications: {
      presentationOptions: ['badge', 'sound', 'alert']
    }
  }
}

export default config
