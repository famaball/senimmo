@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.bien.actions.edit', ['name' => $bien->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <bien-form
                :action="'{{ $bien->resource_url }}'"
                :data="{{ $bien->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.bien.actions.edit', ['name' => $bien->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.bien.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </bien-form>

        </div>
    
</div>

@endsection