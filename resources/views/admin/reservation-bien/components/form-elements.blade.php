<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_users'), 'has-success': fields.id_users && fields.id_users.valid }">
    <label for="id_users" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation-bien.columns.id_users') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_users" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_users'), 'form-control-success': fields.id_users && fields.id_users.valid}" id="id_users" name="id_users" placeholder="{{ trans('admin.reservation-bien.columns.id_users') }}">
        <div v-if="errors.has('id_users')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_users') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_bien'), 'has-success': fields.id_bien && fields.id_bien.valid }">
    <label for="id_bien" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation-bien.columns.id_bien') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_bien" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_bien'), 'form-control-success': fields.id_bien && fields.id_bien.valid}" id="id_bien" name="id_bien" placeholder="{{ trans('admin.reservation-bien.columns.id_bien') }}">
        <div v-if="errors.has('id_bien')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_bien') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_reservation'), 'has-success': fields.id_reservation && fields.id_reservation.valid }">
    <label for="id_reservation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation-bien.columns.id_reservation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_reservation" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_reservation'), 'form-control-success': fields.id_reservation && fields.id_reservation.valid}" id="id_reservation" name="id_reservation" placeholder="{{ trans('admin.reservation-bien.columns.id_reservation') }}">
        <div v-if="errors.has('id_reservation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_reservation') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date_reservation'), 'has-success': fields.date_reservation && fields.date_reservation.valid }">
    <label for="date_reservation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation-bien.columns.date_reservation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.date_reservation" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('date_reservation'), 'form-control-success': fields.date_reservation && fields.date_reservation.valid}" id="date_reservation" name="date_reservation" placeholder="{{ trans('admin.reservation-bien.columns.date_reservation') }}">
        <div v-if="errors.has('date_reservation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date_reservation') }}</div>
    </div>
</div>


