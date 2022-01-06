@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.login.actions.edit', ['name' => $login->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <login-form
                :action="'{{ $login->resource_url }}'"
                :data="{{ $login->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.login.actions.edit', ['name' => $login->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.login.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </login-form>

        </div>
    
</div>

@endsection