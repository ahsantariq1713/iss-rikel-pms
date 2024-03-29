<div class="container-tight py-6" id="div-login">
    <div class="text-center mb-4">
        <a href="."><img src="{{ asset('assets/img/static/logo.png') }}" height="72" alt=""></a>
    </div>

    <form wire:submit.prevent="login" wire:loading.attr="disabled" wire:target="login" class="card card-md">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <div class="form group mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.lazy="email"
                    placeholder="Enter email">
                @error('email')
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">
                    Password
                    <span class="form-label-description">
                        <a href="./forgot-password.html">I forgot password</a>
                    </span>
                </label>
                <div x-data="{showPassword: false}" class="input-group input-group-flat">
                    <input x-bind:type="showPassword ? 'text' : 'password'"
                        class="form-control  @error('password') is-invalid @enderror" wire:model.lazy="password"
                        placeholder="Password" >
                    <span  class="input-group-text @error('password') border-danger @enderror">
                        <a x-on:click=" showPassword = !showPassword " href="javascript:void(0)" class="link-secondary" title=""
                            data-bs-toggle="tooltip" data-bs-original-title="Show password">
                                <svg x-show='showPassword' xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="3" y1="3" x2="21" y2="21" />
                                    <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" />
                                    <path
                                        d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" />
                                </svg>

                                <svg  x-show='!showPassword' xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="2"></circle>
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                    </path>
                                </svg>
                        </a>
                    </span>
                </div>
                @error('password')
                    <span class="text-danger small">{{ $errors->first('password') }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" value="true" wire:mode.defer="remember">
                    <span class="form-check-label">Remember Me</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">
                    <span class="spinner-border spinner-border-sm me-2" wire:loading.delay wire:target="login"></span>
                    Login to Account
                </button>
            </div>
        </div>
    </form>

</div>
