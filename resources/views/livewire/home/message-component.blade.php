<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    
    <div class="col-12">
        <div class="row mb-4">
            <div class="col-xl-7 col-xxl-4">
                <p>
                    @include('livewire.home.session-component')
                </p>
            </div>
        </div>  
        <div class="row">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header"><strong>{{__('Feedback Table')}}</strong></div>
                    <div class="card-body">
                        <livewire:home.feedback-table/>
                        <div class="example">
                            <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        @if ($message)
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">
                                                    {{ $message->name }}{{__('\'s Feedback/Inquiry')}}
                                                </h5>
                                                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-header"><strong>{{__('Email: ')}}</strong><span class="small ms-1">{{ $message->email}}</span></div>
                                                <div class="card-header"><strong>{{__('Subject: ')}}</strong><span class="small ms-1">{{ $message->subject}}</span></div>
                                                    <p>{{ $message->message }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-ghost-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                                                    @if ($message->status == 0)
                                                        <button class="btn btn-ghost-primary" type="button" wire:click="readingFinished({{ $message->id }})">Read</button>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>  
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1006">
                                    <div class="modal fade" id="exampleModalPopovers" tabindex="-1" aria-labelledby="exampleModalPopoversLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                @if ($message)
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalPopoversLabel">{{__('Delete Message/Feedback of ')}}{{ $message->name }}</h5>
                                                        <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{__('Are You Sure You Want To Delete This Message')}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">{{__('Cancel')}}</button>
                                                        <button class="btn btn-primary" type="button" wire:click="deleteMessageNow({{ $message->id }})">{{__('Confirm Deletion')}}</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openMessage(message) {
            console.log(message.name);
            var modalElement = document.getElementById('exampleModalCenteredScrollable');
            var modal = new coreui.Modal(modalElement);
            if (modal) {
                modal.show();
            }
        }

        function confirmDeleteMessage(message) {
            if (message) {
                var modalElement = document.getElementById('exampleModalPopovers');
                var modal = new coreui.Modal(modalElement);
                if (modal) {
                    modal.show();
                }
            }
        }

        function refreshPage() {
            window.location.reload();
        }
    </script>
</div>
