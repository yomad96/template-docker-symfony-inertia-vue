export interface LoginFormInput {
  email: string
  password: string
  remember: boolean
}

export interface RegisterFormInput {
  email: string
  password: string
  passwordConfirmation: string
}

export interface ForgotPasswordFormInput {
  email: string
}
