@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.etat-bien.actions.edit', ['name' => $etatBien->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <etat-bien-form
                :action="'{{ $etatBien->resource_url }}'"
                :data="{{ $etatBien->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.etat-bien.actions.edit', ['name' => $etatBien->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.etat-bien.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </etat-bien-form>

        </div>
    
</div>

@endsection