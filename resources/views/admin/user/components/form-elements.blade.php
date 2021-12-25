<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nom'), 'has-success': fields.nom && fields.nom.valid }">
    <label for="nom" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.nom') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nom" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nom'), 'form-control-success': fields.nom && fields.nom.valid}" id="nom" name="nom" placeholder="{{ trans('admin.user.columns.nom') }}">
        <div v-if="errors.has('nom')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nom') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('prenom'), 'has-success': fields.prenom && fields.prenom.valid }">
    <label for="prenom" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.prenom') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.prenom" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('prenom'), 'form-control-success': fields.prenom && fields.prenom.valid}" id="prenom" name="prenom" placeholder="{{ trans('admin.user.columns.prenom') }}">
        <div v-if="errors.has('prenom')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('prenom') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.user.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email_verified_at'), 'has-success': fields.email_verified_at && fields.email_verified_at.valid }">
    <label for="email_verified_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.email_verified_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.email_verified_at" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('email_verified_at'), 'form-control-success': fields.email_verified_at && fields.email_verified_at.valid}" id="email_verified_at" name="email_verified_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('email_verified_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email_verified_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mot_de_passe'), 'has-success': fields.mot_de_passe && fields.mot_de_passe.valid }">
    <label for="mot_de_passe" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.mot_de_passe') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mot_de_passe" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mot_de_passe'), 'form-control-success': fields.mot_de_passe && fields.mot_de_passe.valid}" id="mot_de_passe" name="mot_de_passe" placeholder="{{ trans('admin.user.columns.mot_de_passe') }}">
        <div v-if="errors.has('mot_de_passe')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mot_de_passe') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telephone'), 'has-success': fields.telephone && fields.telephone.valid }">
    <label for="telephone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.telephone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telephone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telephone'), 'form-control-success': fields.telephone && fields.telephone.valid}" id="telephone" name="telephone" placeholder="{{ trans('admin.user.columns.telephone') }}">
        <div v-if="errors.has('telephone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telephone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_roles'), 'has-success': fields.id_roles && fields.id_roles.valid }">
    <label for="id_roles" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.id_roles') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <select name="id_roles" id="id_roles" v-model="form.id_roles" v-validate="'required|integer'" class="form-control"
                :class="{'form-control-danger': errors.has('id_roles'), 'form-control-success': fields.id_roles && fields.id_roles.valid}"
                placeholder="{{ trans('admin.users.columns.id_roles') }}">
                    @foreach($role as $role)
                        <option value="{{ $role->id }}">{{ $role->guard_name}}</option>
                    @endforeach
                </select>
        <div v-if="errors.has('id_roles')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_roles') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_agence'), 'has-success': fields.id_agence && fields.id_agence.valid }">
    <label for="id_agence" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.id_agence') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

            <select name="id_agence" id="id_agence" v-model="form.id_agence" v-validate="'required|integer'" class="form-control"
                :class="{'form-control-danger': errors.has('id_agence'), 'form-control-success': fields.id_agence && fields.id_agence.valid}"
                placeholder="{{ trans('admin.users.columns.id_agence') }}">
                    @foreach($agence as $agence)
                        <option value="{{ $agence->id }}">{{ $agence->nom}}</option>
                    @endforeach
                </select>
        <div v-if="errors.has('id_agence')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_agence') }}</div>
    </div>
</div>


