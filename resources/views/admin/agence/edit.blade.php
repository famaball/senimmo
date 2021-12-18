@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.agence.actions.edit', ['name' => $agence->email]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <agence-form
                :action="'{{ $agence->resource_url }}'"
                :data="{{ $agence->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.agence.actions.edit', ['name' => $agence->email]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.agence.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </agence-form>

        </div>
    
</div>

@endsection