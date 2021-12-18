<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_type_contact'), 'has-success': fields.id_type_contact && fields.id_type_contact.valid }">
    <label for="id_type_contact" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact-campagne.columns.id_type_contact') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_type_contact" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_type_contact'), 'form-control-success': fields.id_type_contact && fields.id_type_contact.valid}" id="id_type_contact" name="id_type_contact" placeholder="{{ trans('admin.contact-campagne.columns.id_type_contact') }}">
        <div v-if="errors.has('id_type_contact')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_type_contact') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_campagne'), 'has-success': fields.id_campagne && fields.id_campagne.valid }">
    <label for="id_campagne" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact-campagne.columns.id_campagne') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_campagne" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_campagne'), 'form-control-success': fields.id_campagne && fields.id_campagne.valid}" id="id_campagne" name="id_campagne" placeholder="{{ trans('admin.contact-campagne.columns.id_campagne') }}">
        <div v-if="errors.has('id_campagne')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_campagne') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_contact'), 'has-success': fields.id_contact && fields.id_contact.valid }">
    <label for="id_contact" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact-campagne.columns.id_contact') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_contact" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_contact'), 'form-control-success': fields.id_contact && fields.id_contact.valid}" id="id_contact" name="id_contact" placeholder="{{ trans('admin.contact-campagne.columns.id_contact') }}">
        <div v-if="errors.has('id_contact')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_contact') }}</div>
    </div>
</div>


