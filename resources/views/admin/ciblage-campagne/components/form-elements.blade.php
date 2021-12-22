<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_ciblage'), 'has-success': fields.id_ciblage && fields.id_ciblage.valid }">
    <label for="id_ciblage" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ciblage-campagne.columns.id_ciblage') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <select name="id_ciblage" id="id_ciblage" v-model="form.id_ciblage" v-validate="'required|integer'" class="form-control"
            :class="{'form-control-danger': errors.has('id_ciblage'), 'form-control-success': fields.id_ciblage && fields.id_ciblage.valid}"
            placeholder="{{ trans('admin.ciblage_campagne.columns.id_ciblage') }}">
            <option value="">choisir un ciblage</option>
                @foreach($ciblage as $cib)
                    <option value="{{ $cib->id }}">{{ $cib->designation}}</option>
                @endforeach
            </select>
        <div v-if="errors.has('id_ciblage')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_ciblage') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_campagne'), 'has-success': fields.id_campagne && fields.id_campagne.valid }">
    <label for="id_campagne" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ciblage-campagne.columns.id_campagne') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <select name="id_campagne" id="id_campagne" v-model="form.id_campagne" v-validate="'required|integer'" class="form-control"
            :class="{'form-control-danger': errors.has('id_campagne'), 'form-control-success': fields.id_campagne && fields.id_campagne.valid}"
            placeholder="{{ trans('admin.ciblage_campagne.columns.id_campagne') }}">
            <option value="">choisir une campagne</option>
                @foreach($campagne as $camp)
                    <option value="{{ $camp->id }}">{{ $camp->nom}}</option>
                @endforeach
            </select>
        <div v-if="errors.has('id_campagne')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_campagne') }}</div>
    </div>
</div>


