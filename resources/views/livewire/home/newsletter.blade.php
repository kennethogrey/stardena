<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public function removeAlert()
    {
        session()->forget('success');
    }
}; ?>

<section>
    <div class="tab-content rounded-bottom">
        <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1001">
            <form id="emailForm">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control rounded-md" id="subject" name="subject" type="text" placeholder="Subject" value="{{ old('subject') }}">
                    <label for="subject">{{ __('Email Subject') }}</label>
                </div>
                <label for="message">{{ __('Message Body') }}</label>
                <div class="form-floating">
                    <textarea name="message" id="message"></textarea>
                </div>
                <br>
                <div class="form-check">
                    <input class="form-check-input" id="unsubscribe_yes" type="radio" name="unsubscribe" value="yes">
                    <label class="form-check-label" for="unsubscribe_yes">{{ __('Include Unsubscribed') }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="unsubscribe_no" type="radio" name="unsubscribe" value="no" checked>
                    <label class="form-check-label" for="unsubscribe_no">{{ __('Do Not Include Unsubscribed') }}</label>
                </div>
                <div class="col-md-6 mb-3">
                    <button class="btn btn-ghost-primary" type="submit">{{ __('Send Newsletter') }}</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#message').summernote();

            $('#emailForm').on('submit', function(e) {
                e.preventDefault();

                var messageContent = $('#message').summernote('code');
                var subject = $('#subject').val();
                var unsubscribed = $('input[name="unsubscribe"]:checked').val();
                console.log(unsubscribed)

                $.ajax({
                    url: '{{ route('send-newsletter') }}',
                    type: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val(),
                        message: messageContent,
                        subject: subject,
                        unsubscribe: unsubscribed
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Unexpected response status: ' + response.status
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = 'Validation errors: ';
                            $.each(errors, function(key, value) {
                                errorMessage += value + ' ';
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error',
                                text: errorMessage
                            });
                        } else {
                            console.error('Error sending newsletter:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'There was an error sending the newsletter.'
                            });
                        }
                    }
                });
            });
        });
    </script>
    <script>
        function deleteEmail(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this email from the newsletter?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let email_id = id;
                    $.ajax({
                        url: '{{ route('delete-newsletter') }}',
                        type: 'POST',
                        data: {
                            _token: $('input[name="_token"]').val(),
                            email_id: email_id,
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: response.message
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Unexpected response status: ' + response.status
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred: ' + xhr.status + ' ' + error
                            });
                        }
                    });
                }
            });
        }
    </script>

</section>
