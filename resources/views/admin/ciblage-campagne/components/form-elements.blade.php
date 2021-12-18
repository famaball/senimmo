<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_ciblage'), 'has-success': fields.id_ciblage && fields.id_ciblage.valid }">
    <label for="id_ciblage" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ciblage-campagne.columns.id_ciblage') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_ciblage" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_ciblage'), 'form-control-success': fields.id_ciblage && fields.id_ciblage.valid}" id="id_ciblage" name="id_ciblage" placeholder="{{ trans('admin.ciblage-campagne.columns.id_ciblage') }}">
        <div v-if="errors.has('id_ciblage')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_ciblage') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_campagne'), 'has-success': fields.id_campagne && fields.id_campagne.valid }">
    <label for="id_campagne" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ciblage-campagne.columns.id_campagne') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_campagne" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_campagne'), 'form-control-success': fields.id_campagne && fields.id_campagne.valid}" id="id_campagne" name="id_campagne" placeholder="{{ trans('admin.ciblage-campagne.columns.id_campagne') }}">
        <div v-if="errors.has('id_campagne')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_campagne') }}</div>
    </div>
</div>


