<div class="form-group row align-items-center" :class="{'has-danger': errors.has('libelle'), 'has-success': fields.libelle && fields.libelle.valid }">
    <label for="libelle" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.libelle') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.libelle" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('libelle'), 'form-control-success': fields.libelle && fields.libelle.valid}" id="libelle" name="libelle" placeholder="{{ trans('admin.bien.columns.libelle') }}">
        <div v-if="errors.has('libelle')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('libelle') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('adresse'), 'has-success': fields.adresse && fields.adresse.valid }">
    <label for="adresse" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.adresse') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.adresse" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('adresse'), 'form-control-success': fields.adresse && fields.adresse.valid}" id="adresse" name="adresse" placeholder="{{ trans('admin.bien.columns.adresse') }}">
        <div v-if="errors.has('adresse')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('adresse') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('prix'), 'has-success': fields.prix && fields.prix.valid }">
    <label for="prix" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.prix') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.prix" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('prix'), 'form-control-success': fields.prix && fields.prix.valid}" id="prix" name="prix" placeholder="{{ trans('admin.bien.columns.prix') }}">
        <div v-if="errors.has('prix')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('prix') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('type'), 'has-success': fields.type && fields.type.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('type'), 'form-control-success': fields.type && fields.type.valid}" id="type" name="type" placeholder="{{ trans('admin.bien.columns.type') }}">
        <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('surface'), 'has-success': fields.surface && fields.surface.valid }">
    <label for="surface" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.surface') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.surface" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('surface'), 'form-control-success': fields.surface && fields.surface.valid}" id="surface" name="surface" placeholder="{{ trans('admin.bien.columns.surface') }}">
        <div v-if="errors.has('surface')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('surface') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.description" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('description'), 'form-control-success': fields.description && fields.description.valid}" id="description" name="description" placeholder="{{ trans('admin.bien.columns.description') }}">
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('image'), 'has-success': fields.image && fields.image.valid }">
    <label for="image" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.image') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.image" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('image'), 'form-control-success': fields.image && fields.image.valid}" id="image" name="image" placeholder="{{ trans('admin.bien.columns.image') }}">
        <div v-if="errors.has('image')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('image') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_user'), 'has-success': fields.id_user && fields.id_user.valid }">
    <label for="id_user" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.id_user') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_user" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_user'), 'form-control-success': fields.id_user && fields.id_user.valid}" id="id_user" name="id_user" placeholder="{{ trans('admin.bien.columns.id_user') }}">
        <div v-if="errors.has('id_user')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_user') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_agence'), 'has-success': fields.id_agence && fields.id_agence.valid }">
    <label for="id_agence" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.id_agence') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_agence" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_agence'), 'form-control-success': fields.id_agence && fields.id_agence.valid}" id="id_agence" name="id_agence" placeholder="{{ trans('admin.bien.columns.id_agence') }}">
        <div v-if="errors.has('id_agence')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_agence') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_type_bien'), 'has-success': fields.id_type_bien && fields.id_type_bien.valid }">
    <label for="id_type_bien" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.id_type_bien') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_type_bien" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_type_bien'), 'form-control-success': fields.id_type_bien && fields.id_type_bien.valid}" id="id_type_bien" name="id_type_bien" placeholder="{{ trans('admin.bien.columns.id_type_bien') }}">
        <div v-if="errors.has('id_type_bien')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_type_bien') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_statut_bien'), 'has-success': fields.id_statut_bien && fields.id_statut_bien.valid }">
    <label for="id_statut_bien" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.id_statut_bien') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_statut_bien" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_statut_bien'), 'form-control-success': fields.id_statut_bien && fields.id_statut_bien.valid}" id="id_statut_bien" name="id_statut_bien" placeholder="{{ trans('admin.bien.columns.id_statut_bien') }}">
        <div v-if="errors.has('id_statut_bien')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_statut_bien') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_etat_bien'), 'has-success': fields.id_etat_bien && fields.id_etat_bien.valid }">
    <label for="id_etat_bien" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.id_etat_bien') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_etat_bien" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_etat_bien'), 'form-control-success': fields.id_etat_bien && fields.id_etat_bien.valid}" id="id_etat_bien" name="id_etat_bien" placeholder="{{ trans('admin.bien.columns.id_etat_bien') }}">
        <div v-if="errors.has('id_etat_bien')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_etat_bien') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_localite'), 'has-success': fields.id_localite && fields.id_localite.valid }">
    <label for="id_localite" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bien.columns.id_localite') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_localite" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_localite'), 'form-control-success': fields.id_localite && fields.id_localite.valid}" id="id_localite" name="id_localite" placeholder="{{ trans('admin.bien.columns.id_localite') }}">
        <div v-if="errors.has('id_localite')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_localite') }}</div>
    </div>
</div>

