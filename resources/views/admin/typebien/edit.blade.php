@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.typebien.actions.edit', ['name' => $typebien->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <typebien-form
                :action="'{{ $typebien->resource_url }}'"
                :data="{{ $typebien->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.typebien.actions.edit', ['name' => $typebien->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.typebien.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </typebien-form>

        </div>
    
</div>

@endsection