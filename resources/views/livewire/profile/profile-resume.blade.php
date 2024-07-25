<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    public $resume;
    public $user_id;

    public function mount(): void
    {
        $profile = Profile::find(Auth::user()->id);
        $this->title = $profile->resume;
    }


    public function removeAlert()
    {
        session()->forget('success');
    }
}; ?>
<section>
    <div class="row mb-4 align-items-stretch">
        <div class="col-xl-2 col-xxl-2 mb-4 mb-xl-0">
            <div class="border p-4 rounded-3 d-flex flex-column h-100">
                <h4 class="fw-bolder">{{__('Personal Resume')}}</h4>
                <p>{{__('Write A Professional Resume On The Tab.')}}</p>
            </div>
        </div>
        <div class="col-xl-10 col-xxl-10">
            <div class="border p-4 rounded-3 d-flex flex-column h-100">
                <form id="resumeForm">
                    @csrf
                    <label for="floatingTextarea">{{__('Edit and Beatify Resume')}}</label>
                    <div class="form-floating">
                        <textarea name="resume" name="resume" id="resume"></textarea>
                    </div>
                    @error('resume')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <div class="col-md-6 mb-3">
                        <button class="btn btn-ghost-primary">{{ __('Update Resume') }}</button>
                    </div>
                    <x-action-message class="text-success" on="profile-updated">
                        {{ __('Personal Info Updated') }}
                    </x-action-message>
                </form>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-xl-7 col-xxl-4">
            <p>
                @include('livewire.home.session-component')
            </p>
        </div>
    </div> 
    <script>
        $(document).ready(function() {
            $('#resume').summernote();

            $('#resumeForm').on('submit', function(e) {
                e.preventDefault();

                var resumeContent = $('#resume').summernote('code');

                $.ajax({
                    url: '{{ route('update-resume') }}', 
                    type: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val(),
                        resume: resumeContent
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                        } else {
                            alert('Unexpected response status: ' + response.status);
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = 'Validation errors: ';
                            $.each(errors, function (key, value) {
                                errorMessage += value + ' ';
                            });
                            alert(errorMessage);
                        } else {
                            console.error('Error updating resume:', error);
                            alert('There was an error updating the resume.');
                        }
                    }
                });
            });
        });
    </script>
</section>