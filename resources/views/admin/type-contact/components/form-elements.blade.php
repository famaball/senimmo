<div class="form-group row align-items-center" :class="{'has-danger': errors.has('libelle'), 'has-success': fields.libelle && fields.libelle.valid }">
    <label for="libelle" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.type-contact.columns.libelle') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.libelle" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('libelle'), 'form-control-success': fields.libelle && fields.libelle.valid}" id="libelle" name="libelle" placeholder="{{ trans('admin.type-contact.columns.libelle') }}">
        <div v-if="errors.has('libelle')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('libelle') }}</div>
    </div>
</div>


