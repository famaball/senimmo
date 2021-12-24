<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_type_contact'), 'has-success': fields.id_type_contact && fields.id_type_contact.valid }">
    <label for="id_type_contact" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact-campagne.columns.id_type_contact') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

            <select name="id_type_contact" id="id_type_contact" v-model="form.id_type_contact" v-validate="'required|integer'" class="form-control"
            :class="{'form-control-danger': errors.has('id_type_contact'), 'form-control-success': fields.id_type_contact && fields.id_type_contact.valid}"
            placeholder="{{ trans('admin.contact_campagne.columns.id_type_contact') }}">
            <option value="">choisir un type contact</option>
                @foreach($type_contact as $tp)
                    <option value="{{ $tp->id }}">{{ $tp->libelle}}</option>
                @endforeach
            </select>
        <div v-if="errors.has('id_type_contact')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_type_contact') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_campagne'), 'has-success': fields.id_campagne && fields.id_campagne.valid }">
    <label for="id_campagne" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact-campagne.columns.id_campagne') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <select name="id_campagne" id="id_campagne" v-model="form.id_campagne" v-validate="'required|integer'" class="form-control"
            :class="{'form-control-danger': errors.has('id_campagne'), 'form-control-success': fields.id_campagne && fields.id_campagne.valid}"
            placeholder="{{ trans('admin.contact_campagne.columns.id_campagne') }}">
            <option value="">choisir une campagne</option>
                @foreach($campagne as $camp)
                    <option value="{{ $camp->id }}">{{ $camp->nom}}</option>
                @endforeach
            </select>
        <div v-if="errors.has('id_campagne')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_campagne') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_contact'), 'has-success': fields.id_contact && fields.id_contact.valid }">
    <label for="id_contact" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact-campagne.columns.id_contact') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <select name="id_contact" id="id_contact" v-model="form.id_contact" v-validate="'required|integer'" class="form-control"
            :class="{'form-control-danger': errors.has('id_contact'), 'form-control-success': fields.id_contact && fields.id_contact.valid}"
            placeholder="{{ trans('admin.contact_campagne.columns.id_contact') }}">
            <option value="">choisir un contact</option>
                @foreach($contact as $cont)
                    <option value="{{ $cont->id }}">{{ $cont->nom}}</option>
                @endforeach
            </select>
        <div v-if="errors.has('id_contact')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_contact') }}</div>
    </div>
</div>


