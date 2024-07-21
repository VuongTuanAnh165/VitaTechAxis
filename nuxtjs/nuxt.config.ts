// https://nuxt.com/docs/api/configuration/nuxt-config
import { name } from './package.json'

const srcDir = 'src/'

export default defineNuxtConfig({
  app: {
    head: {
      htmlAttrs: {
        lang: 'en'
      },
      titleTemplate () {
        return process.env['NUXT_PUBLIC_APP_NAME'] ?? name
      },
      meta: [
        { charset: 'utf8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' }
      ],
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
      ]
    }
  },
  ssr: false,
  excludeAliases: {
    alias: [
      '@',
      '@@'
    ]
  },
  modules: [
    [
      '@pinia/nuxt',
      {
        autoImports: [
          // automatically imports `defineStore`, `storeToRefs`
          'defineStore', // import { defineStore } from 'pinia'
          'storeToRefs' // import { storeToRefs } from 'pinia'
        ]
      }
    ]
  ],
  typescript: {
    tsConfig: {
      extends: '@tsconfig/strictest/tsconfig.json'
    }
  },
  srcDir,
  runtimeConfig: {
    public: {
      appName: name
    }
  },
  imports: {
    dirs: [
      'composables/**'
    ]
  }
})
