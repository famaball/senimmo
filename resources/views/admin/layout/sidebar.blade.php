<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/agences') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.agence.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/users') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.user.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/statut-biens') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.statut-bien.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/etat-biens') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.etat-bien.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/localites') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.localite.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/contacts') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.contact.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/type-contacts') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.type-contact.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/campagnes') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.campagne.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/type-campagnes') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.type-campagne.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/statut-campagnes') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.statut-campagne.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/ciblages') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.ciblage.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/reservation-biens') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.reservation-bien.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/contact-campagnes') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.contact-campagne.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/ciblage-campagnes') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.ciblage-campagne.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.role.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/permissions') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.permission.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/role-has-permissions') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.role-has-permission.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/typebiens') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.typebien.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/biens') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.bien.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
