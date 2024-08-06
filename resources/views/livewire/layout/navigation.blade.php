<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>
<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <!-- <svg class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
                <use xlink:href="{{ asset('panel/assets/brand/coreui.svg#full') }}"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
                <use xlink:href="{{ asset('panel/assets/brand/coreui.svg#signet') }}"></use>
            </svg> -->
            <div class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
                <img src="{{ getLogoUrl() }}" alt="Stardena" width="auto" height="30">
            </div>
            <div class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
                <img src="{{ getFaviconUrl() }}" alt="Stardena" width="auto" height="30">
            </div>
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" aria-current="{{ request()->routeIs('dashboard') ? 'true' : '' }}">
            <svg class="nav-icon">
            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-speedometer') }}"></use>
            </svg> {{ __('Dashboard') }}
            <!-- <span class="badge badge-sm bg-info ms-auto">NEW</span> -->
            </a>
        </li>
        <li class="nav-title">{{ __('Users Management') }}</li>
        <li class="nav-item"><a class="nav-link" href="{{ route('user') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-user-female') }}"></use>
            </svg> {{ __('Users') }}</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('message') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-pencil') }}"></use>
            </svg> {{__('Feedback')}}</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('partner') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-people') }}"></use>
            </svg> {{__('Partners')}}</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('send.newsletter') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-send') }}"></use>
            </svg> {{__('NewsLetters')}}</a>
        </li>
        
        <li class="nav-title">{{ __('Products & Services') }}</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-star') }}"></use>
            </svg> {{ __('APPs & Systems') }}</a>
            <ul class="nav-group-items compact">
                <li class="nav-item"><a class="nav-link" href="{{ route('software-systems') }}" target="_top">
                    <svg class="nav-icon">
                    <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-devices') }}"></use>
                    </svg> {{ __('Inventory/SaaS') }}</a>
                </li>
            </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-view-module') }}"></use>
            </svg> {{ __('License & Revenue') }}</a>
            <ul class="nav-group-items compact">
                <li class="nav-item"><a class="nav-link" href="//" target="_top">
                    <svg class="nav-icon">
                    <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-terrain') }}"></use>
                    </svg> {{ __('License') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="//" target="_top">
                    <svg class="nav-icon">
                    <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-money') }}"></use>
                    </svg> {{ __('Revenue') }}</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">     
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
