<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_users'), 'has-success': fields.id_users && fields.id_users.valid }">
    <label for="id_users" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation-bien.columns.id_users') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <select name="id_users" id="id_users" v-model="form.id_users" v-validate="'required|integer'" class="form-control"
            :class="{'form-control-danger': errors.has('id_users'), 'form-control-success': fields.id_users && fields.id_users.valid}"
            placeholder="{{ trans('admin.reservation_bien.columns.id_users') }}">
            <option value="">choisir un user</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nom}}</option>
                @endforeach
            </select>
        <div v-if="errors.has('id_users')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_users') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_bien'), 'has-success': fields.id_bien && fields.id_bien.valid }">
    <label for="id_bien" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation-bien.columns.id_bien') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <select name="id_bien" id="id_bien" v-model="form.id_bien" v-validate="'required|integer'" class="form-control"
            :class="{'form-control-danger': errors.has('id_bien'), 'form-control-success': fields.id_bien && fields.id_bien.valid}"
            placeholder="{{ trans('admin.reservation_bien.columns.id_bien') }}">
            <option value="">choisir un bien</option>
                @foreach($bien as $bien)
                    <option value="{{ $bien->id }}">{{ $bien->libelle}}</option>
                @endforeach
            </select>
        <div v-if="errors.has('id_bien')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_bien') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_reservation'), 'has-success': fields.id_reservation && fields.id_reservation.valid }">
    <label for="id_reservation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation-bien.columns.id_reservation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <select name="id_reservation" id="id_reservation" v-model="form.id_reservation" v-validate="'required|integer'" class="form-control"
            :class="{'form-control-danger': errors.has('id_reservation'), 'form-control-success': fields.id_reservation && fields.id_reservation.valid}"
            placeholder="{{ trans('admin.reservation_bien.columns.id_reservation') }}">
            <option value="">choisir une reservation</option>
                @foreach($reservation as $reserv)
                    <option value="{{ $reserv->id }}">{{ $reserv->description}}</option>
                @endforeach
            </select>
        <div v-if="errors.has('id_reservation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_reservation') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date_reservation'), 'has-success': fields.date_reservation && fields.date_reservation.valid }">
    <label for="date_reservation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation-bien.columns.date_reservation') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date_reservation" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('date_reservation'), 'form-control-success': fields.date_reservation && fields.date_reservation.valid}" id="date_reservation" name="date_reservation" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('date_reservation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date_reservation') }}</div>
    </div>
</div>


