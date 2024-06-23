<div style="position: fixed; bottom: 10px; right: 10px; z-index: 9999;">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @foreach(['success', 'warning', 'danger'] as $type)
        @if (session($type))
            <div wire:poll.5s="removeAlert">
                <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <div class="docs-placeholder-img rounded me-2" width="20" height="20" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <img src="{{ getFaviconUrl() }}" width="20" height="20">
                        </div>
                        <strong class="me-auto">{{__('Stardena')}}</strong><small class="text-body-secondary"></small>
                        <button class="btn-close" type="button" data-coreui-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-{{ $type }}">
                        <svg class="nav-icon" style="width: 20px; height: 30px;">
                            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-flight-takeoff') }}"></use>
                        </svg>
                        {{ session($type) }}
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
         