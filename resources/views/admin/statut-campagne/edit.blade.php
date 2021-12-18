@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.statut-campagne.actions.edit', ['name' => $statutCampagne->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <statut-campagne-form
                :action="'{{ $statutCampagne->resource_url }}'"
                :data="{{ $statutCampagne->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.statut-campagne.actions.edit', ['name' => $statutCampagne->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.statut-campagne.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </statut-campagne-form>

        </div>
    
</div>

@endsection