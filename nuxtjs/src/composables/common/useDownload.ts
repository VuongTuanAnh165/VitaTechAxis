import { Directory, Filesystem } from '@capacitor/filesystem'
import { Share } from '@capacitor/share'

import { FileTypeDownload } from '~~/src/constants/FileTypeEstimate'

//https://capacitorjs.com/docs/apis/filesystem
//https://capacitorjs.com/docs/apis/share
export function useDownload () {
  return {
    openNewTab,
    downloadOnWeb,
    downloadOnMobile
  }
}

type Base64 = string

function sleep (milliseconds: number) {
  return new Promise<void>(function (resolve) {
    setTimeout(() => resolve(), milliseconds)
  })
}

function openNewTab (blob: Blob | File, fileName?: string | undefined, isEstimateFile?: boolean | undefined) {
  if (isEstimateFile) {
    if (!blob.size) {
      return false
    }

    if (fileName) {
      const fileExtensionIndex = fileName.lastIndexOf('.')
      if (fileExtensionIndex === -1) {
        return false
      }
      const fileType = fileName.slice(Math.max(0, fileExtensionIndex))
      if (FileTypeDownload.includes(fileType)) {
        return false
      }
    }
  }

  const url = URL.createObjectURL(blob)

  const handler = window.open(url, '_blank')

  return Boolean(handler)
}

async function downloadOnWeb ({ blob, fileName } : {
  readonly blob: Blob | File
  readonly fileName: string
}) {
  const a = document.createElement('a')
  const url = URL.createObjectURL(blob)

  a.href = url
  a.download = fileName
  a.click()
  await sleep(100)
  URL.revokeObjectURL(url)
}

async function downloadOnMobile ({ base64, fileName } : {
  readonly base64: Base64 | undefined
  readonly fileName: string
}) {
  await Filesystem.writeFile({
    path: fileName,
    data: base64 ?? '',
    directory: Directory.Documents
  })
  const filePath = await Filesystem.getUri({
    directory: Directory.Documents,
    path: fileName
  })
  try {
    await Share.share({
      url: filePath.uri,
      title: fileName,
      dialogTitle: fileName
    })
  } catch {
    // Sharing is cancelled so I'll crush it
  }
}
