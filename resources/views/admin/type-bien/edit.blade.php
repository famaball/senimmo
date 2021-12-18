@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.type-bien.actions.edit', ['name' => $typeBien->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <type-bien-form
                :action="'{{ $typeBien->resource_url }}'"
                :data="{{ $typeBien->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.type-bien.actions.edit', ['name' => $typeBien->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.type-bien.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </type-bien-form>

        </div>
    
</div>

@endsection