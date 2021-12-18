<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nom'), 'has-success': fields.nom && fields.nom.valid }">
    <label for="nom" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.campagne.columns.nom') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nom" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nom'), 'form-control-success': fields.nom && fields.nom.valid}" id="nom" name="nom" placeholder="{{ trans('admin.campagne.columns.nom') }}">
        <div v-if="errors.has('nom')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nom') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sujet'), 'has-success': fields.sujet && fields.sujet.valid }">
    <label for="sujet" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.campagne.columns.sujet') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sujet" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sujet'), 'form-control-success': fields.sujet && fields.sujet.valid}" id="sujet" name="sujet" placeholder="{{ trans('admin.campagne.columns.sujet') }}">
        <div v-if="errors.has('sujet')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sujet') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('contenu'), 'has-success': fields.contenu && fields.contenu.valid }">
    <label for="contenu" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.campagne.columns.contenu') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.contenu" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('contenu'), 'form-control-success': fields.contenu && fields.contenu.valid}" id="contenu" name="contenu" placeholder="{{ trans('admin.campagne.columns.contenu') }}">
        <div v-if="errors.has('contenu')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contenu') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nom_emetteur'), 'has-success': fields.nom_emetteur && fields.nom_emetteur.valid }">
    <label for="nom_emetteur" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.campagne.columns.nom_emetteur') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nom_emetteur" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nom_emetteur'), 'form-control-success': fields.nom_emetteur && fields.nom_emetteur.valid}" id="nom_emetteur" name="nom_emetteur" placeholder="{{ trans('admin.campagne.columns.nom_emetteur') }}">
        <div v-if="errors.has('nom_emetteur')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nom_emetteur') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email_emetteur'), 'has-success': fields.email_emetteur && fields.email_emetteur.valid }">
    <label for="email_emetteur" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.campagne.columns.email_emetteur') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email_emetteur" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email_emetteur'), 'form-control-success': fields.email_emetteur && fields.email_emetteur.valid}" id="email_emetteur" name="email_emetteur" placeholder="{{ trans('admin.campagne.columns.email_emetteur') }}">
        <div v-if="errors.has('email_emetteur')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email_emetteur') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('send_to_all'), 'has-success': fields.send_to_all && fields.send_to_all.valid }">
    <label for="send_to_all" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.campagne.columns.send_to_all') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.send_to_all" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('send_to_all'), 'form-control-success': fields.send_to_all && fields.send_to_all.valid}" id="send_to_all" name="send_to_all" placeholder="{{ trans('admin.campagne.columns.send_to_all') }}">
        <div v-if="errors.has('send_to_all')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('send_to_all') }}</div>
    </div>
</div>


