<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nom'), 'has-success': fields.nom && fields.nom.valid }">
    <label for="nom" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.nom') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nom" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nom'), 'form-control-success': fields.nom && fields.nom.valid}" id="nom" name="nom" placeholder="{{ trans('admin.contact.columns.nom') }}">
        <div v-if="errors.has('nom')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nom') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('prenom'), 'has-success': fields.prenom && fields.prenom.valid }">
    <label for="prenom" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.prenom') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.prenom" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('prenom'), 'form-control-success': fields.prenom && fields.prenom.valid}" id="prenom" name="prenom" placeholder="{{ trans('admin.contact.columns.prenom') }}">
        <div v-if="errors.has('prenom')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('prenom') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.contact.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telephone'), 'has-success': fields.telephone && fields.telephone.valid }">
    <label for="telephone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.telephone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telephone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telephone'), 'form-control-success': fields.telephone && fields.telephone.valid}" id="telephone" name="telephone" placeholder="{{ trans('admin.contact.columns.telephone') }}">
        <div v-if="errors.has('telephone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telephone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('localite'), 'has-success': fields.localite && fields.localite.valid }">
    <label for="localite" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.localite') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.localite" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('localite'), 'form-control-success': fields.localite && fields.localite.valid}" id="localite" name="localite" placeholder="{{ trans('admin.contact.columns.localite') }}">
        <div v-if="errors.has('localite')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('localite') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sexe'), 'has-success': fields.sexe && fields.sexe.valid }">
    <label for="sexe" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.sexe') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sexe" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sexe'), 'form-control-success': fields.sexe && fields.sexe.valid}" id="sexe" name="sexe" placeholder="{{ trans('admin.contact.columns.sexe') }}">
        <div v-if="errors.has('sexe')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sexe') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_type_contact'), 'has-success': fields.id_type_contact && fields.id_type_contact.valid }">
    <label for="id_type_contact" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.id_type_contact') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <select name="id_type_contact" id="id_type_contact" v-model="form.id_type_contact" v-validate="'required|integer'" class="form-control"
            :class="{'form-control-danger': errors.has('id_type_contact'), 'form-control-success': fields.id_type_contact && fields.id_type_contact.valid}"
            placeholder="{{ trans('admin.contact.columns.id_type_contact') }}">
            <option value="">choisir un type contact</option>
                @foreach($type_contact as $tc)
                    <option value="{{ $tc->id }}">{{ $tc->libelle}}</option>
                @endforeach
            </select>
        <div v-if="errors.has('id_type_contact')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_type_contact') }}</div>
    </div>
</div>


