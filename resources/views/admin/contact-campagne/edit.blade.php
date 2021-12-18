@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.contact-campagne.actions.edit', ['name' => $contactCampagne->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <contact-campagne-form
                :action="'{{ $contactCampagne->resource_url }}'"
                :data="{{ $contactCampagne->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.contact-campagne.actions.edit', ['name' => $contactCampagne->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.contact-campagne.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </contact-campagne-form>

        </div>
    
</div>

@endsection