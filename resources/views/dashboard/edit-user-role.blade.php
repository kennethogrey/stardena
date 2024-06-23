<div>
    <div id="notification" class="fixed top-0 right-0 mb-4 mr-4 p-4 bg-gray-800 text-white rounded shadow-md opacity-0 
        transition-opacity duration-500 hidden">
        <span id="notificationMessage"></span>
    </div>
    <div
        x-data = "{show : false, user_id: '' }"
        x-show = "show"
        x-on:open-modal.window = "show = true; user_id = $event.detail.user_id;"
        x-on:close-modal.window = "show = false"
        style="display:none"
        class="fixed"
    >

        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-80 backdrop-blur-lg">
            <div class="bg-white w-3/4 md:w-96 h-auto md:h-64 p-8 rounded shadow-lg" style="margin-top: -100px;">
                <div class="px-4 py-3 flex items-center justify-between border-b border-gray-300">
                    <div class="text-xl text-gray-800">{{__('Edit Role') }}</div>
                    <button x-on:click="$dispatch('close-modal')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4">        
                    <form x-on:submit.prevent="editUserRole">
                        <input type="hidden" x-model="user_id">
                        <div class="mt-4">
                            <label for="role" class="w-full font-medium py-2 rounded text-gray-700">Role Name</label>
                            <select class="w-full font-medium py-2 rounded text-gray-700" x-ref="role_id" required>
                                <option class="block mt-1 w-full" value="">Select Role</option>
                                <option class="block mt-1 w-full" value="1">Client</option>
                                <option class="block mt-1 w-full" value="2">Staff</option>
                            </select>
                        </div>

                        <div class="mt-6">
                            <label for="role" class="w-full font-medium py-2 rounded text-gray-700">Staff Role</label>
                            <x-text-input type="text" id="staff" name="staff" class="mt-1 block w-full" required />
                        </div><br>
                        
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Save
                        </button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@3.x.x/dist/alpine.min.js" defer></script>
<script>
    function openForm(user_id) {
        const event = new CustomEvent('open-modal', { detail: { user_id } });
        window.dispatchEvent(event);
    }

    function editUserRole() {
        // Access the rowId value through Alpine.js data
        const user_id = this.user_id;
        const role_id = this.$refs['role_id'].value;
        const staff = document.getElementById('staff').value;
        // alert(user_id)
        
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('user-role') }}",
            type: "POST",
            data: {
                user_id: user_id,
                role_id: role_id,
                staff: staff,
            },
            success: function(response) {
                if (response.success) {
                    showNotification(response.success, response.message);
                } else {
                    showNotification(response.success, response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        this.show = false;

        function showNotification(success, message) {
            var notification = $("#notification");
            var notificationMessage = $("#notificationMessage");

            if (success) {
                notificationMessage.text(message);
                notification.removeClass("bg-red-500").addClass("bg-green-500");
            } else {
                notificationMessage.text(message);
                notification.removeClass("bg-green-500").addClass("bg-red-500");
            }

           notification.removeClass("hidden");
            notification.addClass("opacity-100");

            // Automatically hide the notification after 3 seconds
            setTimeout(function() {
                notification.removeClass("opacity-100");
                notification.addClass("hidden");
            }, 3000); 

        }
    }
</script>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <button class="btn btn-secondary">{{ __('Update User') }}</button>
            <button class="btn btn-ghost-danger" wire:click="closeEditUserModal">{{ __('Close') }}</button>
            <form wire:submit="update_user" class="mt-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-grid gap-2 d-md-block me-3">
                                <button class="btn btn-primary" type="button">
                                    {{ $updateUser->name }}
                                </button>
                            </div>
                            <div class="form-floating flex-grow-1">
                                <input wire:model="name" class="form-control rounded-md" id="floatingInput2" type="text" placeholder="{{ __('user.name') }}">
                                <label for="floatingInput2">{{ __('user.name') }}</label>
                            </div>
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-grid gap-2 d-md-block me-3">
                                <button class="btn btn-primary" type="button">
                                    {{ $updateUser->email }}
                                </button>
                            </div>
                            <div class="form-floating flex-grow-1">
                                <input wire:model="email" class="form-control rounded-md" id="floatingInput2" type="email" placeholder="{{ __('user.email') }}">
                                <label for="floatingInput2">{{ __('user.email') }}</label>
                            </div>
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-grid gap-2 d-md-block me-3">
                                <button class="btn btn-primary" type="button">
                                    {{ $updateUser->phone_number }}
                                </button>
                            </div>
                            <div class="form-floating flex-grow-1">
                                <input wire:model="phone_number" class="form-control rounded-md" id="floatingInput2" type="integer" placeholder="{{ __('user.phone_number') }}">
                                <label for="floatingInput2">{{ __('user.phone_number') }}</label>
                            </div>
                        </div>
                        @error('phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3 d-flex align-items-center">
                        <div class="d-grid gap-2 d-md-block me-3">
                            <button class="btn btn-primary" type="button">
                                {{ $updateUser->role }}
                            </button>
                        </div>
                        <div class="flex-grow-1">
                            <select wire:model="role" class="form-select  h-10 px-3 py-3 rounded-md text-sm font-medium" aria-label="Default select example">
                                <option>{{ __('user.role_name') }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ $updateUser->role === $role->name ? "selected" : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3 d-flex align-items-center">
                        <div class="d-grid gap-2 d-md-block me-3">
                            <button class="btn btn-primary" type="button">
                                {{ $updateUser->status }}
                            </button>
                        </div>
                        <div class="flex-grow-1">
                            <select wire:model="status" class="form-select  h-10 px-3 py-3 rounded-md text-sm font-medium" aria-label="Default select example">
                                <option>{{ __('user.rol_status') }}</option>
                                <option value="active">active</option>
                                <option value="inactive">inactive</option>
                            </select>
                        </div>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <button class="btn btn-ghost-primary">{{ __('user.update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>