export interface ServerError {
  readonly errorcode: string
  readonly message: string
}

export interface ResponseBase<DType = {}> {
  readonly data?: DType
  readonly total?: number
  readonly message?: string
  readonly status: number
  readonly errors?: readonly ServerError[] | Record<string, readonly ServerError[]>
  readonly page?: string
  readonly access_token?: string
  readonly token?: string
}
