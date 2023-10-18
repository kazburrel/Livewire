<div class="container mx-auto my-auto d-flex justify-content-center align-items-center vh-100">
    <div>
        {{-- <div>
            @if ($success)
                <span class="block mb-4 text-green-500">Post saved successfully.</span>
            @endif
        </div> --}}
        {{-- <div>
            <!-- Livewire Component Content -->
            @if (session('alert'))
                <script>
                    swal("{{ session('alert')['title'] }}", "{{ session('alert')['message'] }}", "{{ session('alert')['type'] }}");
                </script>
            @endif
        </div> --}}
        {{-- <form method="POST" wire:submit="save">
            <div>
                <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                <input id="title" wire:model.live="title"
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" />
                @error('title')
                    <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="body" class="block font-medium text-sm text-gray-700">Body</label>
                <textarea id="body" wire:model.live="body" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"></textarea>
                @error('body')
                    <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button
                class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                Save
            </button>
        </form method="POST" wire:submit="save"> --}}
        <form wire:submit.prevent="register">
            @if ($currentStep == 1)
                <div class="card">
                    <div class="card-header bg-secondary text-white">STEP 1/4 - Personal Details</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" wire:model.live="fname" class="form-control">
                            <span class="text-danger">
                                @error('fname')
                                    {{ $message }}
                                @enderror
                            </span>
                            {{-- <div id="fname" class="form-text">We'll never share your title with anyone else.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" wire:model.live="lname" class="form-control" id="lname">
                            <span class="text-danger">
                                @error('lname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" wire:model.live="email" class="form-control" id="email">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
            @endif
            @if ($currentStep == 2)
                <div class="card">
                    <div class="card-header bg-secondary text-white">STEP 2/3 - ADDRESS</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" wire:model.live="address" class="form-control">
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                            {{-- <div id="fname" class="form-text">We'll never share your title with anyone else.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" wire:model.live="city" class="form-control" id="city">
                            <span class="text-danger">
                                @error('city')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" wire:model.live="country" class="form-control" id="country">
                            <span class="text-danger">
                                @error('country')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
            @endif

            @if ($currentStep == 3)
                <div class="card">
                    <div class="card-header bg-secondary text-white">STEP 3/3 - PASSWORD</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" wire:model.live="password" class="form-control">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                            {{-- <div id="fname" class="form-text">We'll never share your title with anyone else.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password Confirmation</label>
                            <input type="password" wire:model.live="password_confirmation" class="form-control"
                                id="password_confirmation">
                            <span class="text-danger">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
            @endif
            <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

                @if ($currentStep == 1)
                    <div></div>
                @endif

                @if ($currentStep == 2 || $currentStep == 3 )
                    <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
                @endif

                @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                    <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
                @endif

                @if ($currentStep == 3)
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                @endif


            </div>
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
        </form>
    </div>
</div>
